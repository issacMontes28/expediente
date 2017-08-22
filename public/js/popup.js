function mostrar(btn){
  var route="pacient/show_details/"+btn;
  $.get(route,function(res){
    $("#id").val(res.id);
    $("#nombre").val(res.nombre);
    $("#apaterno").val(res.apaterno);
    $("#amaterno").val(res.amaterno);
    $("#sexo").val(res.sexo);
    $("#fecha_nac").val(res.fecha_nac);
    $("#curp").val(res.curp);
    $("#nacionalidad").val(res.nacionalidad);
    $("#calle").val(res.calle);
    $("#num_ext").val(res.num_ext);
    $("#num_int").val(res.num_int);
    $("#colonia").val(res.colonia);
    $("#cp").val(res.cp);
    $("#telefono_casa").val(res.telefono_casa);
    $("#telefono_celular").val(res.telefono_celular);
    $("#telefono_oficina").val(res.telefono_oficina);
    $("#correo").val(res.correo);
  });
}
function modifyPacient(btn){
  var token = $("#token").val();
  var id = $("#id").val();
  var url="pacientUpdate/update/"+id;

  $.ajax({
     type: "POST",
     url: url,
     headers: {'X-CSRF-TOKEN': token},
     data: {
       nombre : $("#nombre").val(),
       apaterno : $("#apaterno").val(),
       amaterno : $("#amaterno").val(),
       sexo : $("#sexo").val(),
       fecha_nac : $("#fecha_nac").val(),
       curp : $("#curp").val(),
       nacionalidad : $("#nacionalidad").val(),
       calle : $("#calle").val(),
       num_ext : $("#num_ext").val(),
       num_int : $("#num_int").val(),
       colonia :  $("#colonia").val(),
       cp : $("#cp").val(),
       telefono_casa : $("#telefono_casa").val(),
       telefono_celular : $("#telefono_celular").val(),
       telefono_oficina : $("#telefono_oficina").val(),
       correo : $("#correo").val()
     }, // Adjuntar los campos del formulario enviado.
     success: function(respuesta)
     {
        alert(respuesta);
        location.reload();
     }
  });
}
function mostrarsoap(btn){
  var route="deleter/show_details/"+btn;
  $.get(route,function(res){
    $("#dinicial").val(res.dinicial);
    $("#subjetivo").val(res.soap.subjetivo);
    $("#objetivo").val(res.soap.objetivo);
    $("#analisis").val(res.soap.analisis);
    $("#plan").val(res.soap.plan);
    $("#difinal").val(res.difinal);
  });
}
function mostrarnurse(btn){
  var route="deleter/show_details/"+btn;
  /*var now = new Date();
  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var today = now.getFullYear()+"-"+(month)+"-"+(day) ;*/
  $.get(route,function(res){
    $("#fecha1").val(res.nursesheet.fecha);
    $("#id_paciente").val(res.paciente);
    $("#peso").val(res.somatometria[0].peso);
    $("#altura").val(res.somatometria[0].altura);
    $("#psistolica").val(res.somatometria[0].psistolica);
    $("#pdiastolica").val(res.somatometria[0].pdiastolica);
    $("#frespiratoria").val(res.somatometria[0].frespiratoria);
    $("#pulso").val(res.somatometria[0].pulso);
    $("#oximetria").val(res.somatometria[0].oximetria);
    $("#glucometria").val(res.somatometria[0].glucometria);

    if (res.habitus.length > 0){
      $("#condicion").val(res.habitus[0].condicion);
      $("#constitucion").val(res.habitus[0].constitucion);
      $("#entereza").val(res.habitus[0].entereza);
      $("#proporcion").val(res.habitus[0].proporcion);
      $("#simetria").val(res.habitus[0].simetria);
      $("#biotipo").val(res.habitus[0].biotipo);
      $("#actitud").val(res.habitus[0].actitud);
      $("#fascies").val(res.habitus[0].fascies);
      $("#movanormal").val(res.habitus[0].movanormal);
      $("#movanormal_obs").val(res.habitus[0].movanormal_obs);
      $("#marchanormal").val(res.habitus[0].marchanormal);
    }

    if (res.medicamentos.length > 0){
      for (var i = 0; i < res.medicamentos.length; i++) {
        $("#modal_medicaments").html("<div class='form-group'><label>Nombre de medicamento</label><input id='nombre_med' class='form-control' value='"+res.medicamentos[i].nombre_med+"'></input></div><div class='form-group'><label>Fecha de administración</label><input id='fecha_admin' class='form-control' value='"+res.medicamentos[i].fecha_admin+"'></input></div><div class='form-group'><label>Cantidad</label><input id='cantidad' class='form-control' value='"+res.medicamentos[i].cantidad+"'></input></div><div class='form-group'><label>Vía de administración</label><input id='via' class='form-control' value='"+res.medicamentos[i].via+"'></input></div><br></br>");
      }
    }

    if (res.actuals.length > 0){
      for (var i = 0; i < res.actuals.length; i++) {
        $("#modal_actuals").html("<div class='form-group'><label>Nombre de medicamento</label><input id='nombre_med' class='form-control' value='"+res.actuals[i].nombre_med+"'></input></div><label>Vía de administración</label><input id='via' class='form-control' value='"+res.actuals[i].via+"'></input></div><br></br>");
      }
    }

  });
}
function modificarestudio(btn){
  var route="studyUpdate/show_details/"+btn;
  $.get(route,function(res){
    $("#id").val(res.id);
    $("#nombre").val(res.nombre);
    $("#folio").val(res.folio);
    $("#proposito").val(res.proposito);
    $("#metodologia").val(res.metodologia);
  });
}
function modifystudy(btn){

  var token = $("#token").val();
  var id = $("#id").val();
  var nombre = $("#nombre").val();
  var folio = $("#folio").val();
  var proposito = $("#proposito").val();
  var metodologia = $("#metodologia").val();
  var url="studyUpdate/update/"+id;

  $.ajax({
     type: "POST",
     url: url,
     headers: {'X-CSRF-TOKEN': token},
     data: {
       nombre: nombre, folio: folio, proposito: proposito, metodologia: metodologia
     }, // Adjuntar los campos del formulario enviado.
     success: function(respuesta)
     {
        alert(respuesta);
        location.reload();
     }
  });
}
