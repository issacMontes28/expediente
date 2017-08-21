<input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
<input id="id" class="form-control" type="hidden"></input>
<div class="form-group">
{!!Form::label('fecha_1','Fecha:')!!}
<input type="date" id="fecha1" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('id_paciente_1','Paciente:')!!}
<input id="id_paciente" class="form-control"></input>
</div>
