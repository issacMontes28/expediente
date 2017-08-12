function DiagnosticoPrevio(elemento){
 this.id=ko.observable(elemento.id);
 this.nombre=ko.observable(elemento.nombre);
 this.tipo=ko.observable(elemento.tipo);
}
function Diagnostico(elemento){
 this.consecutivo=ko.observable(elemento.consecutivo);
 this.nombre=ko.observable(elemento.nombre);
}
function Match(elemento){
 this.id_estudio=ko.observable(elemento.id_estudio);
 this.estudio=ko.observable(elemento.estudio);
 this.id_enfermedad=ko.observable(elemento.id_enfermedad);
 this.enfermedad=ko.observable(elemento.enfermedad);
}

function AuxMatch(elemento){
 this.enfermedad=ko.observable(elemento.enfermedad);
 this.tipo_diagnostico=ko.observable(elemento.tipo_diagnostico);
 this.estudio=ko.observable(elemento.estudio);
}
//La función appViewModel es la clase principal desde la cual se realizan todas
//las operaciones pertinentes.
function appViewModel(){

  // se utiliza la variable self para evitar causar conflictos en el compilador.
  // hace referencia a los atrubutos de la clase appViewModel.
	var self=this;

  //Variables para el SOAP
  self.dinicial = ko.observable();
  self.difinal = ko.observable();
	self.nuevos_diagnosticos_ini = ko.observableArray([]);
  self.nuevos_diagnosticos_fin = ko.observableArray([]);
  self.diagnosticos_previos = ko.observableArray([]);
  self.matches = ko.observableArray([]);
  self.aux_matchesi = ko.observableArray([]);
  self.aux_matchesf = ko.observableArray([]);
	var consec = 0;
  var consecfin = 0;

  $.getJSON('../../json/diagnosticos_modificar.json',function(result){
    var DiagnosticosArreglo= $.map(result,function(item){
      return new DiagnosticoPrevio(item);
    });
    self.diagnosticos_previos(DiagnosticosArreglo);
    /*
    for (var i = 0; i < self.diagnosticos_previos().length; i++) {
      if (self.diagnosticos_previos()[i].tipo()=="Inicial") {
        $( "#tabla_previos_iniciales" ).append( "<tr><td width='50%'><input value='"+self.diagnosticos_previos()[i].id()+"'disabled></input></td><td width='50%'><input value='"+self.diagnosticos_previos()[i].nombre()+"'disabled></input></td></tr>" );
      }
    }*/
  });

	//agregar nuevo diagnostico
	 self.anadirdiagini=function(){
		consec ++;
		self.nuevos_diagnosticos_ini.push(new Diagnostico({consecutivo: consec, nombre: self.dinicial()}));
    self.aux_matchesi.splice(0,self.aux_matchesi().length);
    for (var i = 0; i < self.nuevos_diagnosticos_ini().length; i++) {
      var enfermedad =  self.nuevos_diagnosticos_ini()[i].nombre();
      for (var j = 0; j < self.matches().length; j++) {
        if (enfermedad == self.matches()[j].enfermedad()) {
          self.aux_matchesi.push(new AuxMatch({enfermedad: enfermedad, tipo_diagnostico: "Inicial",
          estudio: self.matches()[j].estudio()}));
        }
      }
    }
	 }
	//Quita nuevo diagnostico
	self.removediagini=function(diagnostico){
		consec --;
		self.nuevos_diagnosticos_ini.remove(diagnostico);
	}
  //agregar nuevo diagnostico
	 self.anadirdiagfin=function(){
		consecfin ++;
		self.nuevos_diagnosticos_fin.push(new Diagnostico({consecutivo: consecfin, nombre: self.difinal()}));
    self.aux_matchesf.splice(0,self.aux_matchesf().length);
    for (var i = 0; i < self.nuevos_diagnosticos_fin().length; i++) {
      var enfermedad =  self.nuevos_diagnosticos_fin()[i].nombre();
      for (var j = 0; j < self.matches().length; j++) {
        if (enfermedad == self.matches()[j].enfermedad()) {
          self.aux_matchesf.push(new AuxMatch({enfermedad: enfermedad, tipo_diagnostico: "Final",
          estudio: self.matches()[j].estudio()}));
        }
      }
    }
	 }
	//Quita nuevo diagnostico
	self.removediagfin=function(diagnostico){
		consecfin --;
		self.nuevos_diagnosticos_fin.remove(diagnostico);
	}

  self.modificarSoap=function(){
    var subjetivo = $('#subjetivo').val();
    var objetivo = $('#objetivo').val();
    var analisis = $('#analisis').val();
    var plan = $('#plan').val();

    var r= confirm("¿Modificar nota SOAP?");
    if (r==true) {
      //Variable que indica si hubo algún error
      var diniciales = self.nuevos_diagnosticos_ini();
      var difinales = self.nuevos_diagnosticos_fin();
      var bandera = 0;
      //condiciones para la somatometría
      if (subjetivo=="" && bandera==0) {alert("Faltan datos: subjetivo en el análisis SOAP"); bandera =1;}
      if (objetivo=="" && bandera==0) {alert("Faltan datos: objetivo en el análisis SOAP"); bandera =1;}
      if (analisis=="" && bandera==0) {alert("Faltan datos: análisis en el análisis SOAP"); bandera =1;}
      if (plan=="" && bandera==0) {alert("Faltan datos: plan en el análisis SOAP"); bandera =1;}
      if(bandera == 0){
        if (self.nuevos_diagnosticos_ini().length==0 || self.nuevos_diagnosticos_fin().length==0) {
          if (self.nuevos_diagnosticos_fin().length==0 && self.nuevos_diagnosticos_ini().length==0) {
            var r2= confirm("No modificó diagnósticos iniciales ni finales,¿mantener los prievios?");
            var diniciales = "Ninguno";
            var difinales="Ninguno";
          }
          else if(self.nuevos_diagnosticos_ini().length==0) {
            var r2= confirm("No modificó diagnósticos iniciales,¿mantener los prievios?");
            var diniciales = "Ninguno";
          }
          else{
            var r2= confirm("No modificó diagnósticos finales,¿mantener los prievios?");
            var difinales="Ninguno";
          }
          /*
          alert(diniciales);
          alert(difinales);*/
          if (r2==true) {
            var token = $("#token").val();
            var id_soap = $("#id_soap").val();
            $.ajax({
               url: 'UpdateSoap',
               headers: {'X-CSRF-TOKEN': token},
               type: 'POST',
               data: {
                 subjetivo: subjetivo, objetivo: objetivo, analisis: analisis,
                 plan: plan, diniciales: diniciales,
                 difinales: difinales, soap: id_soap
               },
               dataType: 'JSON',
               error: function(respuesta) {alert("error");},
               success: function(respuesta) {
                 if (respuesta) {
                    alert(respuesta.mensaje);
                   }else {
                   alert("error");
                }
              }
            });
          }
        }
        else {
          /*
          alert(diniciales);
          alert(difinales);*/
          var token = $("#token").val();
          var id_soap = $("#id_soap").val();
          $.ajax({
             url: 'UpdateSoap',
             headers: {'X-CSRF-TOKEN': token},
             type: 'POST',
             data: {
               subjetivo: subjetivo, objetivo: objetivo, analisis: analisis,
               plan: plan, diniciales: self.nuevos_diagnosticos_ini(),
               difinales: self.nuevos_diagnosticos_fin(), soap: id_soap
             },
             dataType: 'JSON',
             error: function(respuesta) {alert("error");},
             success: function(respuesta) {
               if (respuesta) {
                  alert("Se ha actualizado análisis SOAP correctamente");
                 }else {
                 alert("error");
              }
            }
         });
        }
      }
    }
  }
}
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
