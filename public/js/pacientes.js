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

$("#bloqueo").click(function(event){
  $.blockUI({ message: $('#question'), css: { width: '275px' } });
});

$('#yes').click(function() {
  $.unblockUI();
  return false;
});

 $('#no').click(function() {
   $.blockUI({ message: "<h1>Remote call in progress...</h1>" });
   $.ajax({
       url: 'wait.php',
       cache: false,
       complete: function() {
           // unblock when remote call returns
           $.unblockUI();
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
               bootbox.confirm({
                 message: "¿Desea crear documento PDF del registro del paciente?",
                 buttons: {
                     confirm: {
                         label: 'Si',
                         className: 'btn-primary'
                     },
                     cancel: {
                         label: 'No'
                     }
                 },
                 callback: function (result) {
                   if (result==true) {
                   bootbox.prompt({
                     title: "Elija los apartados que quiere ver en el documento PDF",
                     inputType: 'checkbox',
                     inputOptions: [
                         {
                             text: 'Datos demográficos',
                             value: '1',
                         },
                         {
                             text: 'Antecedentes heredo-familiares',
                             value: '2',
                         },
                         {
                             text: 'Antecedentes personales patológicos',
                             value: '3',
                         },
                         {
                             text: 'Antecedentes personales no patológicos',
                             value: '4',
                         },
                         {
                             text: 'Antecedentes gineco-obstétricos',
                             value: '5',
                         },
                         {
                             text: 'Interrogatorio por aparatos y sistemas',
                             value: '6',
                         },
                         {
                             text: 'Síntomas generales',
                             value: '7',
                         },
                         {
                             text: 'Padecimiento actual',
                             value: '8',
                         },
                         {
                             text: 'Somatometría',
                             value: '9',
                         },
                         {
                             text: 'Inspección general',
                             value: '10',
                         },
                         {
                             text: 'Exploración física',
                             value: '11',
                         }
                       ],
                       callback: function (result) {
                           document.location.href = 'pdf/'+result+"";
                       }
                    });
                  }
                  else {
                    var dialog2 = bootbox.dialog({
                        message: '<p><i class="fa fa-spin fa-spinner"></i> Espere...</p>'
                    });
                    dialog2.init(function(){
                        setTimeout(function(){
                            dialog.find('.bootbox-body').html("Hecho");
                        }, 1000);
                    });
                  }
                 }
               });
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
