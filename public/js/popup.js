function mostrar(btn){
  var route="pacient/show_details/"+btn;
  $.get(route,function(res){
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

function mostrar2(btn){
  var route="pacient/show_details/"+btn;
  $.get(route,function(res){
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
