function mostrar(btn){
  var route="pacient/show_details/"+btn;
  $.get(route,function(res){


    //Datos del paciente
    $("#id").val(res.paciente.id);
    $("#nombre").val(res.paciente.nombre);
    $("#apaterno").val(res.paciente.apaterno);
    $("#amaterno").val(res.paciente.amaterno);
    $("#sexo").val(res.paciente.sexo);
    $("#fecha_nac").val(res.paciente.fecha_nac);
    $("#curp").val(res.paciente.curp);
    $("#nacionalidad").val(res.paciente.nacionalidad);
    $("#calle").val(res.paciente.calle);
    $("#num_ext").val(res.paciente.num_ext);
    $("#num_int").val(res.paciente.num_int);
    $("#colonia").val(res.paciente.colonia);
    $("#cp").val(res.paciente.cp);
    $("#telefono_casa").val(res.paciente.telefono_casa);
    $("#telefono_celular").val(res.paciente.telefono_celular);
    $("#telefono_oficina").val(res.paciente.telefono_oficina);
    $("#correo").val(res.paciente.correo);

    //Antecedentes heredo-familiares
    $("#diabetes").val(res.antecedenteshf.diabetes);
    $("#hipertension").val(res.antecedenteshf.hipertension);
    $("#cardiopatia").val(res.antecedenteshf.cardiopatia);
    $("#hepatopatia").val(res.antecedenteshf.hepatopatia);
    $("#nefropatia").val(res.antecedenteshf.nefropatia);
    $("#enmentales").val(res.antecedenteshf.enmentales);
    $("#asma").val(res.antecedenteshf.asma);
    $("#cancer").val(res.antecedenteshf.cancer);
    $("#enalergicas").val(res.antecedenteshf.enalergicas);
    $("#endocrinas").val(res.antecedenteshf.endocrinas);
    $("#otros").val(res.antecedenteshf.otros);
    $("#intneg").val(res.antecedenteshf.intneg);

    //Antecedentes heredo-familiares disabled
    $("#diabetes").prop('disabled', true);
    $("#hipertension").prop('disabled', true);
    $("#cardiopatia").prop('disabled', true);
    $("#hepatopatia").prop('disabled', true);
    $("#nefropatia").prop('disabled', true);
    $("#enmentales").prop('disabled', true);
    $("#asma").prop('disabled', true);
    $("#cancer").prop('disabled', true);
    $("#enalergicas").prop('disabled', true);
    $("#endocrinas").prop('disabled', true);
    $("#otros").prop('disabled', true);
    $("#intneg").prop('disabled', true);


    //Antecedentes personales patologicos
    $("#enactuales").val(res.antecedentespp.enactuales);
    $("#quirurjicos").val(res.antecedentespp.quirurjicos);
    $("#transfuncionales").val(res.antecedentespp.transfuncionales);
    $("#alergias").val(res.antecedentespp.alergias);
    $("#traumaticos").val(res.antecedentespp.traumaticos);
    $("#hosprevias").val(res.antecedentespp.hosprevias);
    $("#adicciones").val(res.antecedentespp.adicciones);
    $("#otros2").val(res.antecedentespp.otros);

    //Antecedentes personales patologicos disabled
    $("#enactuales").prop('disabled', true);
    $("#quirurjicos").prop('disabled', true);
    $("#transfuncionales").prop('disabled', true);
    $("#alergias").prop('disabled', true);
    $("#traumaticos").prop('disabled', true);
    $("#hosprevias").prop('disabled', true);
    $("#adicciones").prop('disabled', true);
    $("#otros2").prop('disabled', true);

    //Antecedentes personales NO patologicos
    $('input[name=banio][value=' + res.antecedentespnp.banio + ']').prop('checked',true)
    $('input[name=dientes][value=' + res.antecedentespnp.dientes + ']').prop('checked',true)
    $('input[name=habitacion][value=' + res.antecedentespnp.habitacion + ']').prop('checked',true)

    $("#tabaquismo").val(res.antecedentespnp.tabaquismo);
    $("#alcoholismo").val(res.antecedentespnp.alcoholismo);
    $("#alimentacion").val(res.antecedentespnp.alimentacion);
    $("#deportes").val(res.antecedentespnp.deportes);


    //Antecedentes personales NO patologicos disabled
    $('input[name=banio]').prop('disabled', true);
    $('input[name=dientes]').prop('disabled', true);
    $('input[name=habitacion]').prop('disabled', true);

    $('input[name=agua_pacient_check]').prop('disabled', true);
    $('input[name=energia_pacient_check]').prop('disabled', true);
    $('input[name=telefono_pacient_check]').prop('disabled', true);
    $('input[name=internet_pacient_check]').prop('disabled', true);
    $('input[name=tv_pacient_check]').prop('disabled', true);

    $("#tabaquismo").prop('disabled', true);
    $("#alcoholismo").prop('disabled', true);
    $("#alimentacion").prop('disabled', true);
    $("#deportes").prop('disabled', true);

    //Antecedentes gineco-obstétricos
    $("#menarca").val(res.antecedentesgo.menarca);
    $("#rmenstrual").val(res.antecedentesgo.rmenstrual);
    $("#dismenorrea").val(res.antecedentesgo.dismenorrea);
    $("#ivsa").val(res.antecedentesgo.ivsa);
    $("#parejas").val(res.antecedentesgo.parejas);
    $("#gestas").val(res.antecedentesgo.gestas);
    $("#abortos").val(res.antecedentesgo.abortos);
    $("#partos").val(res.antecedentesgo.partos);
    $("#cesareas").val(res.antecedentesgo.cesareas);
    $("#fpp").val(res.antecedentesgo.fpp);
    $("#menopausia").val(res.antecedentesgo.menopausia);
    $("#climaterio").val(res.antecedentesgo.climaterio);
    $("#mpp").val(res.antecedentesgo.mpp);
    $("#citologia").val(res.antecedentesgo.citologia);
    $("#mastografia").val(res.antecedentesgo.mastografia);

    //Antecedentes gineco-obstétricos disabled
    $("#menarca").prop('disabled', true);
    $("#rmenstrual").prop('disabled', true);
    $("#dismenorrea").prop('disabled', true);
    $("#ivsa").prop('disabled', true);
    $("#parejas").prop('disabled', true);
    $("#gestas").prop('disabled', true);
    $("#abortos").prop('disabled', true);
    $("#partos").prop('disabled', true);
    $("#cesareas").prop('disabled', true);
    $("#fpp").prop('disabled', true);
    $("#menopausia").prop('disabled', true);
    $("#climaterio").prop('disabled', true);
    $("#mpp").prop('disabled', true);
    $("#citologia").prop('disabled', true);
    $("#mastografia").prop('disabled', true);

    //Exploración por aparatos y sistemas
    $("#ap_digestivo").val(res.antecedentesgo.dismenorrea);
    $("#ap_cardivascular").val(res.antecedentesgo.dismenorrea);
    $("#ap_respiratorio").val(res.antecedentesgo.dismenorrea);
    $("#ap_urinario").val(res.antecedentesgo.ivsa);
    $("#ap_genital").val(res.antecedentesgo.parejas);
    $("#ap_hematologico").val(res.antecedentesgo.gestas);
    $("#ap_endocrino").val(res.antecedentesgo.abortos);
    $("#ap_osteomuscular").val(res.antecedentesgo.partos);
    $("#si_nervioso").val(res.antecedentesgo.cesareas);
    $("#si_sensorial").val(res.antecedentesgo.fpp);
    $("#sicosomatico").val(res.antecedentesgo.menopausia);

    //Exploración por aparatos y sistemas disabled
    $("#ap_digestivo_check").prop('disabled', true);
    $("#ap_cardivascular_check").prop('disabled', true);
    $("#ap_respiratorio_check").prop('disabled', true);
    $("#ap_urinario_check").prop('disabled', true);
    $("#ap_genital_check").prop('disabled', true);
    $("#ap_hematologico_check").prop('disabled', true);
    $("#ap_endocrino_check").prop('disabled', true);
    $("#ap_osteomuscular_check").prop('disabled', true);
    $("#si_nervioso_check").prop('disabled', true);
    $("#si_sensorial_check").prop('disabled', true);
    $("#sicosomatico_check").prop('disabled', true);


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
