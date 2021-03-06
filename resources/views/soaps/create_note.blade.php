@extends('layouts.admin')
@section('barra')
	@include('soaps.forms.barra')
@endsection
@include('alerts.request')
  @section('contenido')
	{!!Form::open()!!}
			<h3>Datos de consulta *</h3>
			<div class="form-group">
 				{!!Form::label('id_doctor_1','Paciente al que se le asignará la consulta:')!!}
				<input id="pacient" value="{{$pacient->nombre.' '.$pacient->apaterno.' '.$pacient->amaterno}}" class="form-control" disabled />
 			</div>
 			<div class="form-group">
	 			{!!Form::label('fecha_1','Fecha de la consulta (DD-MM-AA):')!!}
				<input type="date" id="fecha_consulta" class="form-control" data-bind="value: fecha_consulta" class="form-control"></input>
 			</div>
 			<div class="form-group">
	 			{!!Form::label('hora_1','Hora de la consulta (opcional):')!!}
				<input type="time" id="hora_consulta" data-bind="value: hora_consulta" class="form-control"></input>
 			</div>
 			<div class="form-group">
 				{!!Form::label('id_doctor_1','Doctor asignado a la consulta:')!!}
				<input id="pacient" value="{{ Auth::user()->nombre.' '.Auth::user()->apellidos }}" class="form-control" disabled />
 			</div>

	 <br></br>
	 <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
	 <input type="hidden" name="id_doctor" value="{{ Auth::id() }}" id="id_doctor"></input>
	 <input type="hidden" name="id_paciente" value="<?php echo $pacient->id ?>" id="id_paciente"></input>
	 <input type="hidden" value="{{ Auth::user()->correo.', '}}" id="mail"></input>
	 <input type="hidden" value="{{'Teléfono: '.Auth::user()->telefono }}" id="phones"></input>

        @include('soaps.forms.soap')
				<br></br><br></br><br></br><br></br>
				<button class="btn btn-success" data-bind="click: $root.addSoap">Guardar SOAP</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
				<table class="table table-hover" data-bind="visible: aux_matchesi().length > 0 || aux_matchesf().length > 0">
				   <thead  class="thead-inverse" >
				      <tr>
				         <th colspan="5">
				            <h4 align="center"><strong style="color:#0174DF">Lista de pruebas sugeridas para cada uno de los diagnósticos</strong></h4>
				         </th>
				      </tr>
				      <tr style="background:#06092E;color:white">
								 <th>Seleccionar</th>
								 <th>Nombre del diagnóstico</th>
				         <th>Tipo de diagnóstico</th>
				         <th>Nombre de prueba sugerida</th>
								 <th>Acción</th>
				      </tr>
				   </thead>
				   <tbody data-bind="foreach: { data: aux_matchesi, as: 'match' }">
				      <tr>
								 <td><input type="checkbox" data-bind="checkedValue: $data, checked: $root.chosenStudies" /></td>
						 		 <td data-bind="text: match.enfermedad()"   ></input></td>
				         <td data-bind="text: match.tipo_diagnostico()"       ></input></td>
				         <td data-bind="text: match.estudio()"            ></input></td>
				      </tr>
				   </tbody>
					 <tbody data-bind="foreach: { data: aux_matchesf, as: 'match' }">
				      <tr>
								 <td><input type="checkbox" data-bind="checkedValue: $data, checked: $root.chosenStudies" /></td>
						 		 <td data-bind="text: match.enfermedad()"   ></input></td>
				         <td data-bind="text: match.tipo_diagnostico()"       ></input></td>
				         <td data-bind="text: match.estudio()"            ></input></td>
				      </tr>
				   </tbody>
				</table>
				<br></br>
				<div>
					<button type="button" id="btnModal" class="btn	btn-info" data-toggle="modal"
						data-target="#exampleModal" data-bind="visible: aux_matchesi().length > 0 || aux_matchesf().length > 0">
						Encargar pruebas seleccionadas a JM Research</button>
				</div>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
						<form>
							<div class="form-group" id="requested_studies">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">Solicitante de prueba:</label>
								<input type="text" class="form-control" id="recipient-name" disabled>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">Paciente a quien se realizará prueba:</label>
								<input type="text" class="form-control" id="pacient-name" disabled>
							</div>
							<div class="form-group">
								<label for="message-text" class="form-control-label">Fecha y hora solicitada (La disponibilidad dependerá enteramente de JM Research):</label>
								<br></br>
								<label for="date">Fecha</label>
								<input type="date" id="date-study" name="date">
								<label for="time">Hora</label>
								<input type="time" id="time">
							</div>
							<div class="form-group">
								<label for="message-text" class="form-control-label">Cuerpo del mensaje:</label>
								<textarea class="form-control" id="message-text"></textarea>
							</div>
						</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="button" class="btn btn-primary" id="send_request">Enviar solicitud</button>
		      </div>
		    </div>
		  </div>
		</div>

    {!!Form::close()!!}
@stop
@section('js')
	{!!Html::script('js/typeahead/bloodhound.js')!!}
	{!!Html::script('js/typeahead/typeahead.jquery.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.min.js')!!}
	{!!Html::script('js/buscar_diagnostico.js')!!}
	{!!Html::script('js/soap_create.js')!!}
@stop
