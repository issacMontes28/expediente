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
  self.subjetivo = ko.observable();
  self.objetivo = ko.observable();
  self.analisis = ko.observable();
  self.plan = ko.observable();
  self.dinicial = ko.observable();
  self.difinal = ko.observable();
	self.nuevos_diagnosticos_ini = ko.observableArray([]);
  self.nuevos_diagnosticos_fin = ko.observableArray([]);
  self.matches = ko.observableArray([]);
  self.aux_matchesi = ko.observableArray([]);
  self.aux_matchesf = ko.observableArray([]);
	var consec = 0;
  var consecfin = 0;

  $.getJSON('../../json/matches.json',function(result){
    var matchesArreglo= $.map(result,function(item){
      return new Match(item);
    });
    self.matches(matchesArreglo);
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

  self.agregarSoap=function(){
    var r= confirm("¿Guardar nuevo registro?");
    if (r==true) {
      //Variable que indica si hubo algún error
      var bandera = 0;
      //condiciones para la somatometría
      if (self.subjetivo()==undefined && bandera==0) {alert("Faltan datos: subjetivo en el análisis SOAP"); bandera =1;}
      if (self.objetivo()==undefined && bandera==0) {alert("Faltan datos: objetivo en el análisis SOAP"); bandera =1;}
      if (self.analisis()==undefined && bandera==0) {alert("Faltan datos: análisis en el análisis SOAP"); bandera =1;}
      if (self.plan()==undefined && bandera==0) {alert("Faltan datos: plan en el análisis SOAP"); bandera =1;}
      if (self.nuevos_diagnosticos_ini().length == 0 && bandera==0) {alert("Faltan datos: diagnóstico inicial en el análisis SOAP"); bandera =1;}
      if (self.nuevos_diagnosticos_fin().length == 0 && bandera==0) {alert("Faltan datos: diagnóstico final en el análisis SOAP"); bandera =1;}

      if(bandera == 0){
        var token = $("#token").val();
        var id_cita = $("#id_cita").val();
        $.ajax({
           url: 'AddSoap',
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           data: {
             subjetivo: self.subjetivo(), objetivo: self.objetivo(), analisis: self.analisis(),
						 plan: self.plan(), diniciales: self.nuevos_diagnosticos_ini(),
             id_cita: id_cita, difinales: self.nuevos_diagnosticos_fin()
           },
           dataType: 'JSON',
           error: function(respuesta) {alert("error");},
           success: function(respuesta) {
             if (respuesta) {
                alert("Se han asignado análisis SOAP correctamente");
               }else {
               alert("error");
             }
           }
       });
     }
    }
  }
}
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
