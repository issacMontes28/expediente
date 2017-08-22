@extends('layouts.admin')
@section('barra')
	@include('nursesheets.forms.barra')
@endsection
@section('contenido')
	@include('alerts.errors')
  @include('alerts.request')
  <?php $message=Session::get('message')?>
  @if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>
  @endif
	@include('nursesheets.forms.search')
 <div>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>ID</th>
				<th>Fecha HDE</th>
        <th>Paciente</th>
				<th>Información</th>
				<th>Acción</th>
			</thead>
			@foreach($nursesheets as $nursesheet)
        <?php
          $mysqli = new mysqli("localhost", "root", "", "siam");
          if ($mysqli->connect_errno) {
              echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          }
          $acentos = $mysqli->query("SET NAMES 'utf8'");
          //obtenemos el id de la cita
          $id_paciente=$nursesheet->id_paciente;
          //se obtienen los datos de esa cita, interesa el nombre del paciente y el doctor que lo está atendiendo
          $query = $mysqli->query("select * from pacients where id='$id_paciente'");
          $fila = $query->fetch_assoc();
          $pac = $fila['nombre'].' '.$fila['apaterno'].' '.$fila['amaterno'];
        ?>
			<tbody>
        <tr>
					<td>{{$nursesheet->id}}</td>
          <td>{{$nursesheet->fecha}}</td>
          <td><?php echo $pac; ?></td>
					<td>
						<button  type="button" value="<?php  echo $nursesheet->id?>" Onclick="mostrarnurse(this.value);" class="btn btn-info btn-sm" data-toggle='modal' data-target='#myModal'>Mostrar info</a>
					</td>
					<td>
						<td>{!!link_to_route('nurseSheet.edit', $title = 'Actualizar HDE', $parameters = $nursesheet->id,
							$attributes = ['class'=>'btn btn-primary btn-sm','style'=>"color:#FFFFFF"])!!}
						</td>
					</td>
        </tr>
      </tbody>
		@endforeach
		</table>
    {!!$nursesheets->render()!!}
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Detalle de hoja de enfermería</h4>
				</div>
				<div class="modal-body">
					@include('nurseSheets.forms.nursesheet_modal_pacient')
					@include('nurseSheets.forms.nursesheet_modal_options')
					{!!Form::open()!!}
					@include('nurseSheets.forms.nursesheet_modal_somatometry')
					@include('nurseSheets.forms.nursesheet_modal_habitus')
					@include('nurseSheets.forms.nursesheet_modal_medicaments')
					{!!Form::close()!!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
@stop
@section('js')
	{!!Html::script('js/popup.js')!!}
	{!!Html::script('js/visible_divs.js')!!}
@stop
