//La función appViewModel es la clase principal desde la cual se realizan todas
//las operaciones pertinentes.
function appViewModel(){

  // se utiliza la variable self para evitar causar conflictos en el compilador.
  // hace referencia a los atrubutos de la clase appViewModel.
	var self=this;
	self.visible_btnTabla = ko.observable(0);
  //Variables para la somatometría
	/*
  self.peso = ko.observable();
  self.altura = ko.observable();
  self.diabetesAHF = ko.observable();
  self.hipertensionAHF = ko.observable();
  self.cardiopatiaAHF = ko.observable();
  self.hepatopatiaAHF = ko.observable();
  self.nefropatiaAHF = ko.observable();
  self.ementalesAHF = ko.observable();
  self.asmaAHF = ko.observable();
  self.cancerAHF = ko.observable();
  self.ealergicasAHF = ko.observable();
  self.eendocrinasAHF = ko.observable();
  self.otrosAHF = ko.observable();
  self.intnegAHF = ko.observable();*/

	self.tabla = function(){ self.visible_btnTabla(1); }
	self.tabla_ocultar = function(){ self.visible_btnTabla(0); }
}
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
