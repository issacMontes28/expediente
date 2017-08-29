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

  self.submit=function(){
    bootbox.confirm({
      message: "Confirme para registrar nuevo paciente",
      buttons: {
          confirm: {
              label: 'Aceptar',
              className: 'btn-primary'
          },
          cancel: {
              label: 'Cancelar'
          }
      },
      callback: function (result) {
        if (result==true) {
          var dialog = bootbox.dialog({
              title: 'Registrando paciente',
              message: '<p><i class="fa fa-spin fa-spinner"></i> Espere...</p>'
          });
          var url = "addPacient"; // El script a dónde se realizará la petición.
          $.ajax({
             type: "POST",
             url: url,
             data: $("#formulario_paciente").serialize(), // Adjuntar los campos del formulario enviado.
             success: function(response)
             {
               dialog.init(function(){
                   setTimeout(function(){
                       dialog.find('.bootbox-body').html(response);
                   }, 2500);
               });
               bootbox.confirm("¿Desea crear documento PDF del registro del paciente?", function(result){
                 if (result==true) {
                    document.location.href = 'pdf';
                  }
                  else {
                    var dialog2 = bootbox.dialog({
                        message: '<p><i class="fa fa-spin fa-spinner"></i> Hecho...</p>'
                    });
                    dialog2.init(function(){
                        setTimeout(function(){
                            dialog.find('.bootbox-body').html(response);
                        }, 1000);
                    });
                  }
               })
             }
          });
        }
      }
    });
  }

 }
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
