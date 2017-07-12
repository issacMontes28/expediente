function Estudio(elemento){
 this.id=ko.observable(elemento.id);
 this.nombre=ko.observable(elemento.nombre);
 this.folio=ko.observable(elemento.folio);
}

function Diagnostico(elemento){
 this.id=ko.observable(elemento.id);
 this.nombre=ko.observable(elemento.nombre);
}

function Match(elemento){
 this.id_diagnostico=ko.observable(elemento.id_diagnostico);
 this.nombre_diagnostico=ko.observable(elemento.nombre_diagnostico);
 this.id_estudio=ko.observable(elemento.id_estudio);
 this.nombre_estudio=ko.observable(elemento.nombre_estudio);
}

//La función appViewModel es la clase principal desde la cual se realizan todas
//las operaciones pertinentes.
function appViewModel(){

  // se utiliza la variable self para evitar causar conflictos en el compilador.
  // hace referencia a los atrubutos de la clase appViewModel.
	var self=this;

  self.diagnosticos=ko.observableArray([]);
  self.estudios=ko.observableArray([]);
  self.matches=ko.observableArray([]);
  self.selectedDiagnostic = ko.observable();

  self.chosenDiagnostic = ko.observable();
  self.chosenStudy = ko.observableArray([]);

  //Función que lee el archivo en formato json que contiene los medicamentos guardados en la base de datos.
  $.getJSON('../json/diagnosticos.json',function(result){
    //el método map pasa cada diagnostico que lee de la base de datos a un arreglo temporal.
  	var diagnosticosArreglo= $.map(result,function(item){
  	 	return new Diagnostico(item);
  	});
  	self.diagnosticos(diagnosticosArreglo);
  });

  //Función que lee el archivo en formato json que contiene las promociones de la base de datos.
  $.getJSON('../json/estudios.json',function(result){
    //el método map pasa cada estudio que lee de la base de datos a un arreglo temporal.
    var estudiosArreglo= $.map(result,function(item){
      return new Estudio(item);
    });
    self.estudios(estudiosArreglo);
  });

   self.agregarMatch=function(){
     if (self.chosenDiagnostic()==undefined) {
       alert("Seleccione un diagnóstico");
     }
     else if (self.chosenStudy()==undefined) {
       alert("Seleccione un estudio");
     }
     else {
       self.matches.push(new Match({id_diagnostico: self.chosenDiagnostic().id(),
       nombre_diagnostico: self.chosenDiagnostic().nombre(),
       id_estudio: self.chosenStudy().id(),
       nombre_estudio: self.chosenStudy().nombre()}));
     }
   }
   //Quita nueva depilación
   self.removeNewMatch=function(match){self.matches.remove(match);}

  self.addMatch=function(){
      var token = $("#token").val();
      $.ajax({
         url: '/addMatch',
         headers: {'X-CSRF-TOKEN': token},
         type: 'POST',
         data: {matches: self.matches()},
         dataType: 'JSON',
         error: function(respuesta) {alert("error");},
         success: function(respuesta) {
           if (respuesta) {
             alert("Se han asignado estudios a los diagnósticos satisfactoriamente");
             location.reload();
           }else {
             alert("error");
           }
         }
     });
 }
}
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
