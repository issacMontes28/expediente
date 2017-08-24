function Somatometria(elemento){
  this.peso = ko.observable(elemento.peso);
  this.altura= ko.observable(elemento.altura);
  this.psistolica= ko.observable(elemento.psistolica);
  this.pdiastolica = ko.observable(elemento.pdiastolica);
  this.frespiratoria= ko.observable(elemento.frespiratoria);
  this.pulso= ko.observable(elemento.pulso);
  this.oximetria = ko.observable(elemento.oximetria);
  this.glucometria= ko.observable(elemento.glucometria);
}
function Habitus(elemento){
  this.condicion = ko.observable(elemento.condicion);
  this.constitucion = ko.observable(elemento.constitucion);
  this.entereza= ko.observable(elemento.entereza);
  this.proporcion = ko.observable(elemento.proporcion);
  this.simetria = ko.observable(elemento.simetria);
  this.biotipo = ko.observable(elemento.biotipo);
  this.actitud = ko.observable(elemento.actitud);
  this.fascies = ko.observable(elemento.fascies);
  this.movanormal = ko.observable(elemento.movanormal);
  this.movanormal_obs = ko.observable(elemento.movanormal_obs);
  this.marchanormal= ko.observable(elemento.marchanormal);
}
function Medicamento(elemento){
  this.nombre_med = ko.observable(elemento.nombre_med);
  this.fecha_admin = ko.observable(elemento.fecha_admin);
  this.cantidad = ko.observable(elemento.cantidad);
  this.via = ko.observable(elemento.via);
}

function Actual(elemento){
  this.nombre_med = ko.observable(elemento.nombre_med);
  this.via = ko.observable(elemento.via);
}
//La función appViewModel es la clase principal desde la cual se realizan todas
//las operaciones pertinentes.
function appViewModel(){

  // se utiliza la variable self para evitar causar conflictos en el compilador.
  // hace referencia a los atrubutos de la clase appViewModel.
	var self=this;

  //Variables para la HDE
  self.condiciones = ko.observableArray(['Ambulante','Encamado']);
  self.constituciones = ko.observableArray(['Débil','Fuerte','Fuerte debilitado','Media']);
  self.biotipos = ko.observableArray(['Ectomorfo','Endomorfo','Mesomorfo']);
  self.actitudes = ko.observableArray(['Forzada','Instintiva','Libremente escogida','Pasiva']);
  self.movanormales = ko.observableArray(['Convulsiones','Fasciculaciones','Hemibalismo','Tics',
  'Movimientos atetósicos','Movimientos coreicos','Movimientos corfológicos','Movimientos distónicos',
  'Movimientos parkinsonianos','Temblores']);
  self.marchanormales = ko.observableArray(['Marcha atáxica','Marcha claudicante','Marcha espástica',
  'Marcha helicópoda','Marcha miopática','Marcha parkinsoniana',
  'Marcha polineurítica','Marcha titubeante']);
  self.actitudes = ko.observableArray(['Libremente escogida','Instintiva','Forzada','Pasiva']);
  self.vias = ko.observableArray(['Inhalatoria','Intramuscular','Intranasal','Intravenosa',
  'Oftálmica','Ótica','Oral','Parental','Rectal','Subcutánea','Sublingual','Tópica','Transdérmica','Vaginal']);
  self.lista_fascies=ko.observableArray(['No característica','Febril(voluptuosa)','Tifica','Leonina',
  'Adissoniana','Hipocrática','Lúpica','Cushiniana','Hipertiroidea','Tetánica','Mixedematosa','Parkinsoniana',
  'Peritoneal','Adenoidea','Mongólica','Nefrótica']);
	self.somatometria = ko.observableArray([]);
  self.habitus = ko.observableArray([]);
  self.medicamentos = ko.observableArray([]);
  self.actuals = ko.observableArray([]);

  $.getJSON('../../json/nurseSheet_somatometria.json',function(result){
    var SomatometriaArreglo= $.map(result,function(item){
      return new Somatometria(item);
    });
    self.somatometria(SomatometriaArreglo);
  });

  $.getJSON('../../json/nurseSheet_habitus.json',function(result){
    var HabitusArreglo= $.map(result,function(item){
      return new Habitus(item);
    });
    self.habitus(HabitusArreglo);
  });

  $.getJSON('../../json/nurseSheet_medicamentos.json',function(result){
    var MedicamentosArreglo= $.map(result,function(item){
      return new Medicamento(item);
    });
    self.medicamentos(MedicamentosArreglo);
  });

  $.getJSON('../../json/nurseSheet_actuals.json',function(result){
    var ActualsArreglo= $.map(result,function(item){
      return new Actual(item);
    });
    self.actuals(ActualsArreglo);
  });

  self.visible_P = ko.observable(1);
  self.mostrarP = function() { self.visible_P(1); }
  self.ocultarP = function() { self.visible_P(0); }

  self.visible_habitus = ko.observable(0);
  self.mostrarHabitus = function(){ self.visible_habitus(1); }
  self.ocultarHabitus = function(){ self.visible_habitus(0); }

  self.visible_medicamentos = ko.observable(0);
  self.mostrarMedicamentos = function(){ self.visible_medicamentos(1); }
  self.ocultarMedicamentos = function(){ self.visible_medicamentos(0); }

  self.visible_actuals = ko.observable(0);
  self.mostrarActuals = function(){ self.visible_actuals(1); }
  self.ocultarActuals = function(){ self.visible_actuals(0); }

/*
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
    var subjetivo = $(#subjetivo).val();
    var objetivo = $(#objetivo).val();
    var analisis = $(#analisis).val();
    var plan = $(#plan).val();

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
          alert(difinales);
          if (r2==true) {
            var token = $("#token").val();
            var id_soap = $("#id_soap").val();
            $.ajax({
               url: UpdateSoap,
               headers: {X-CSRF-TOKEN: token},
               type: POST,
               data: {
                 subjetivo: subjetivo, objetivo: objetivo, analisis: analisis,
                 plan: plan, diniciales: diniciales,
                 difinales: difinales, soap: id_soap
               },
               dataType: JSON,
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
          alert(difinales);
          var token = $("#token").val();
          var id_soap = $("#id_soap").val();
          $.ajax({
             url: UpdateSoap,
             headers: {X-CSRF-TOKEN: token},
             type: POST,
             data: {
               subjetivo: subjetivo, objetivo: objetivo, analisis: analisis,
               plan: plan, diniciales: self.nuevos_diagnosticos_ini(),
               difinales: self.nuevos_diagnosticos_fin(), soap: id_soap
             },
             dataType: JSON,
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
  }*/
}
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
