$("#letra_diagnostico").change(function(event){
  $.get("match/"+event.target.value+"",function(response,state){
      $("#diagnosticos").empty();
      for (var i = 0; i < response.length; i++) {
        $("#diagnosticos").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
      }
  });
});
$("#letra_estudio").change(function(event){
  $.get("match2/"+event.target.value+"",function(response,state){
      $("#estudios").empty();
      for (var i = 0; i < response.length; i++) {
        $("#estudios").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
      }
  });
});

  $("#dname").keyup(function(event){
    if (event.target.value != "") {
      var jqxhr = $.get("match3/"+event.target.value+"",function(response,state){
          $("#diagnosticos").empty();
          for (var i = 0; i < response.length; i++) {
            $("#diagnosticos").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
          }
      })
      .fail(function() {
        console.log( "Ninguna coincidencia con texto ingresado" );
      });
    }
  })




function Match(elemento){
 this.id_diagnostico=ko.observable(elemento.id_diagnostico);
 this.nombre_diagnostico=ko.observable(elemento.nombre_diagnostico);
 this.id_estudio=ko.observable(elemento.id_estudio);
 this.nombre_estudio=ko.observable(elemento.nombre_estudio);
 this.proposito=ko.observable(elemento.proposito);
 this.metodologia=ko.observable(elemento.metodologia);
}

//La función appViewModel es la clase principal desde la cual se realizan todas
//las operaciones pertinentes.
function appViewModel(){

  // se utiliza la variable self para evitar causar conflictos en el compilador.
  // hace referencia a los atrubutos de la clase appViewModel.
	var self=this;

  self.matches=ko.observableArray([]);

  self.agregarMatch=function(){
     if ($('select[id=diagnosticos]').val()==undefined) {
       alert("Seleccione un diagnóstico");
     }
     else if ($('select[id=estudios]').val()==undefined) {
       alert("Seleccione un estudio");
     }
     else if ($('textarea[id="proposito"]').val()=="") {
       alert("Agregue el propósito del estudio para el diagnóstico seleccionado");
     }
     else if ($('textarea[id="metodologia"]').val()=="") {
       alert("Agregue la metodología usada en el estudio");
     }
     else {
       var combo1 = document.getElementById("diagnosticos");
       var selected1 = combo1.options[combo1.selectedIndex].text;

       var combo2 = document.getElementById("estudios");
       var selected2 = combo2.options[combo2.selectedIndex].text;

       self.matches.push(new Match({id_diagnostico: $('select[id=diagnosticos]').val(),
       nombre_diagnostico: selected1,id_estudio: $('select[id=estudios]').val(), nombre_estudio: selected2,
       proposito: $('textarea[id="proposito"]').val(), metodologia: $('textarea[id="metodologia"]').val()}));
     }
   }
   //Quita nueva depilación
   self.removeNewMatch=function(match){self.matches.remove(match);}

   self.addMatch=function(){
      var token = $("#token").val();
      var r= confirm("¿Guardar nuevos enlaces?");
      if (r==true) {
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
 }
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
