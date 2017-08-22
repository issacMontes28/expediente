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

  //Variables para la HDE
  self.arreglo = ko.observableArray("<?php echo $info ?>");
  alert(self.arreglo.length);

}
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
