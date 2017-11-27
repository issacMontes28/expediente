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

function StudyRequest(elemento){
 this.pacient=ko.observable(elemento.pacient);
 this.emisor=ko.observable(elemento.emisor);
 this.mail=ko.observable(elemento.mail);
 this.phones=ko.observable(elemento.phones);
 this.cuerpo=ko.observable(elemento.cuerpo);
 this.pruebas=ko.observableArray(elemento.pruebas);
 this.date=ko.observable(elemento.date);
 this.time=ko.observable(elemento.time);
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
  self.chosenStudies = ko.observableArray([]);
  self.matches = ko.observableArray([]);
  self.aux_matchesi = ko.observableArray([]);
  self.aux_matchesf = ko.observableArray([]);
  self.studyArray = ko.observableArray([]);
	var consec = 0;
  var consecfin = 0;

  $.getJSON('../../json/matches.json',function(result){
    var matchesArreglo= $.map(result,function(item){
      return new Match(item);
    });
    self.matches(matchesArreglo);
  });

	//agregar nuevo diagnostico inicial
	 self.anadirdiagini=function(){
     console.log($('#dinicial').val());
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

	//Quita nuevo diagnostico inicial
	self.removediagini=function(diagnostico){
		consec --;
		self.nuevos_diagnosticos_ini.remove(diagnostico);
	}

  //agregar nuevo diagnostico final
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

	//Quita nuevo diagnostico final
	self.removediagfin=function(diagnostico){
		consecfin --;
		self.nuevos_diagnosticos_fin.remove(diagnostico);
	}

  //Enviando solicitudes de estudios a JM Research
  $(document).on('click', '#btnModal', function(event) {
    if (self.chosenStudies().length == 0) {
      alert("Seleccione una prueba primero");
    }
    else {
      $('#exampleModalLabel').html("<strong> Solicitud de prueba(s) a JM Research </strong><br></br>");
      $('#requested_studies').empty();
      $('#requested_studies').append('<label class="form-control-label">Prueba(s) solicitadas:</label>');
      for (var i = 0; i < self.chosenStudies().length; i++) {
        $('#requested_studies').append("<input type='text' class='form-control' disabled value='"+self.chosenStudies()[i].estudio()+"'></input>");
      }
      $('#recipient-name').val(  $('#doctor').val() );
      $('#pacient-name').val(  $('#pacient').val() );
      $('#myModal').modal();

      $(document).on('click', '#send_request', function(event) {

      var token = $("#token").val();

      $.ajax({
         url: 'requestStudy',
         headers: {'X-CSRF-TOKEN': token},
         data: {
           id_cita:      $("#id_cita").val(),
           id_doctor:    $('#id_doctor').val(),
           id_paciente:  $('#id_paciente').val(),
           pacient:      $('#pacient-name').val(),
           emisor:       $('#recipient-name').val(),
           mail:         $('#mail').val(),
           phones:       $('#phones').val(),
           cuerpo:       $('#message-text').val(),
           pruebas:      self.chosenStudies(),
           date:         $('#date-study').val(),
           time:         $('#time').val()
         },
         type: 'POST',
         dataType: 'JSON',
         error: function(respuesta) {alert("error");},
         success: function(respuesta) {
           if (respuesta) {
              alert(respuesta);
              var r3 = confirm("¿Desea imprimir hoja de solicitud de estudio?");
              if (r3 == true) {
                $('#myModal').modal('hide');
                document.location.href = 'printStudy';
              }
              else {
                $('#myModal').modal('hide');
              }
             }
             else {
             alert("error");
            }
          }
        });
      });
     }
  });

  self.agregarSoap=function(){
    var r= confirm("¿Guardar nuevo registro?");
    if (r==true) {

      //Variable que indica si hubo algún error
      var bandera = 0;

      //condiciones para la somatometría
      if (self.subjetivo()==undefined && bandera==0) {
        alert("Faltan datos: subjetivo en el análisis SOAP"); bandera =1;}
      if (self.objetivo()==undefined && bandera==0) {
        alert("Faltan datos: objetivo en el análisis SOAP"); bandera =1;}
      if (self.analisis()==undefined && bandera==0) {
        alert("Faltan datos: análisis en el análisis SOAP"); bandera =1;}
      if (self.plan()==undefined && bandera==0) {
        alert("Faltan datos: plan en el análisis SOAP"); bandera =1;}
      if (self.nuevos_diagnosticos_ini().length == 0 && bandera==0) {
        alert("Faltan datos: diagnóstico inicial en el análisis SOAP"); bandera =1;}
      if (self.nuevos_diagnosticos_fin().length == 0 && bandera==0) {
        alert("Faltan datos: diagnóstico final en el análisis SOAP"); bandera =1;}

      if(bandera == 0){
        var token = $("#token").val();
        var id_cita = $("#id_cita").val();
        $.ajax({
           url: 'AddSoap',
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           data: {
             subjetivo: self.subjetivo(), objetivo: self.objetivo(),
             analisis: self.analisis(), plan: self.plan(),
             diniciales: self.nuevos_diagnosticos_ini(), id_cita: id_cita,
             difinales: self.nuevos_diagnosticos_fin()
           },
           dataType: 'JSON',
           error: function(respuesta) {alert("error");},
           success: function(respuesta) {
             if (respuesta) {
                alert("Se han asignado análisis SOAP correctamente");
                var r2 = confirm("¿Crear PDF de nota médica?");
                if (r2 == true) {
                  document.location.href = 'pdf';
                }
           }
           else {
             alert("error")
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
