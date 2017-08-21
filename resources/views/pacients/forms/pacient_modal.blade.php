{!!Form::open()!!}
<input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
<input id="id" class="form-control" type="hidden"></input>
<div class="form-group">
<div class="form-group">
{!!Form::label('nombre_1','Nombre:')!!}
<input type="text" id="nombre" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('apaterno_1','Primer apellido:')!!}
<input type="text" id="apaterno" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('amaterno_1','Segundo apellido:')!!}
<input type="text" id="amaterno" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('sexo_1','Sexo:')!!}
<input type="text" id="sexo" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('fecha_nac_1','Fecha de nacimiento:')!!}
<input type="text" id="fecha_nac" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('curp_1','CURP:')!!}
<input type="text" id="curp" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('cp_1','Código postal:')!!}
<input type="text" id="cp" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('colonia_1','Colonia:')!!}
<input type="text" id="colonia" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('calle_1','Calle:')!!}
<input type="text" id="calle" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('num_ext_1','Número exterior:')!!}
<input type="text" id="num_ext" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('num_int_1','Número interior:')!!}
<input type="text" id="num_int" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('telefono_casa_1','Telefono de casa:')!!}
<input type="text" id="telefono_casa" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('telefono_celular_1','Telefono celular:')!!}
<input type="text" id="telefono_celular" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('telefono_oficina_1','Telefono de oficina:')!!}
<input type="text" id="telefono_oficina" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('correo_1','Correo:')!!}
<input type="text" id="correo" class="form-control" ></input>
</div>
<div class="form-group">
   <button id="btnAgregar2" type="submit" class="btn btn-primary btn-sm" Onclick="modifyPacient();">
   Modificar paciente</button>
</div>
{!!Form::close()!!}
