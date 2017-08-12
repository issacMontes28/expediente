$("#state").change(function(event){
  $.get("towns/"+event.target.value+"",function(response,state){
      $("#town").empty();
      for (var i = 0; i < response.length; i++) {
        $("#town").append("<option value='"+response[i].CVE_MUN+"'>"+response[i].NOM_MUN+"</option>");
      }
  });
});

$("#town").change(function(event){
  $.get("towns/"+$('select[id=state]').val()+"/localities/"+event.target.value+"",function(response,state){
      $("#locality").empty();
      for (var i = 0; i < response.length; i++) {
        $("#locality").append("<option value='"+response[i].id+"'>"+response[i].NOM_LOC+"</option>");
      }
  });
});
//La función appViewModel es la clase principal desde la cual se realizan todas
//las operaciones pertinentes.
function appViewModel(){

  // se utiliza la variable self para evitar causar conflictos en el compilador.
  // hace referencia a los atrubutos de la clase appViewModel.
	var self=this;

  self.visible_AHF = ko.observable(0);
  self.mostrarAHF = function(){ self.visible_AHF(1); }
  self.ocultarAHF = function(){ self.visible_AHF(0); }

/*
  self.visible_AHF = ko.observable(0);
  self.mostrarAHF = function(){ $("#tablita").fadeIn("slow");
   $("#btnOcultarAHF").fadeIn("slow"); $("#btnMostrarAHF").fadeOut("slow");}
  self.ocultarAHF = function(){ $("#tablita").fadeOut("slow");
   $("#btnMostrarAHF").fadeIn("slow"); $("#btnOcultarAHF").fadeOut("slow");}*/

  self.visible_APP = ko.observable(0);
  self.mostrarAPP = function(){ self.visible_APP(1); }
  self.ocultarAPP = function(){ self.visible_APP(0); }

  self.visible_APNP = ko.observable(0);
  self.mostrarAPNP = function(){ self.visible_APNP(1); }
  self.ocultarAPNP = function(){ self.visible_APNP(0); }

  self.submit=function(){
    var r= confirm("¿Guardar nuevo registro de paciente?");
    if (r==true) {
      var url = "addPacient"; // El script a dónde se realizará la petición.
      $.ajax({
         type: "POST",
         url: url,
         data: $("#formulario_paciente").serialize(), // Adjuntar los campos del formulario enviado.
         success: function(data)
         {
            //alert("Se ha agregado nuevo paciente");
           //$("#respuesta").html(data); // Mostrar la respuestas del script PHP.
         }
      });
    }
  }

 }
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
