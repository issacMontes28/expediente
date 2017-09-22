@extends('layouts.admin')
@section('barra')
	@include('soaps.forms.barra')
@endsection
@include('alerts.request')
  @section('contenido')
   <table class="table">
     <thead>
       <th>Paciente</th>
       <th>Fecha de consulta (AA-MM-DD)</th>
       <th>Hora de consulta</th>
       <th>Área a la que asiste</th>
       <th>Doctor asignado</th>
     </thead>
       <?php
         $mysqli = new mysqli("localhost", "root", "", "siam");
         if ($mysqli->connect_errno) {
             echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
         }
         $acentos = $mysqli->query("SET NAMES 'utf8'");
         //obtenemos el id de la cita
         $id_paciente=$cita->id_paciente;
         //se obtienen los datos de esa cita, interesa el nombre del paciente y el doctor que lo está atendiendo
         $query = $mysqli->query("select * from pacients where id='$id_paciente'");
         $fila = $query->fetch_assoc();
         $pac = $fila['nombre'].' '.$fila['apaterno'].' '.$fila['amaterno'];

         $id_doctor = $cita->id_doctor;
         $query2 = $mysqli->query("select * from doctors where id='$id_doctor'");
         $fila2 = $query2->fetch_assoc();
         $ndoc = $fila2['nombre'].' '.$fila2['apaterno'].' '.$fila2['amaterno'];
       ?>
     <tbody>
       <td><?php echo $pac; ?></td>
       <td>{{$cita->fecha}}</td>
       <td>{{$cita->hora}}</td>
       <td>{{$cita->area}}</td>
       <td><?php echo $ndoc; ?></td>
   </table>
	 {!!Form::open()!!}
	 <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
	 <input type="hidden" name="id_cita" value="<?php echo $id_cita?>" id="id_cita"></input>
        @include('soaps.forms.soap')
				<br></br><br></br><br></br><br></br>
				<button class="btn btn-success" data-bind="click: $root.agregarSoap">Guardar SOAP</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
				<table class="table table-hover" data-bind="visible: aux_matchesi().length > 0 || aux_matchesf().length > 0">
				   <thead  class="thead-inverse" >
				      <tr>
				         <th colspan="5">
				            <h4 align="center"><strong style="color:#0174DF">Lista de pruebas sugeridas para cada uno de los diagnósticos</strong></h4>
				         </th>
				      </tr>
				      <tr style="background:#06092E;color:white">
				         <th>Nombre del diagnóstico</th>
				         <th>Tipo de diagnóstico</th>
				         <th>Nombre de prueba sugerida</th>
				      </tr>
				   </thead>
				   <tbody data-bind="foreach: { data: aux_matchesi, as: 'match' }">
				      <tr>
						 		 <td data-bind="text: match.enfermedad()"   ></input></td>
				         <td data-bind="text: match.tipo_diagnostico()"       ></input></td>
				         <td data-bind="text: match.estudio()"            ></input></td>
				      </tr>
				   </tbody>
					 <tbody data-bind="foreach: { data: aux_matchesf, as: 'match' }">
				      <tr>
						 		 <td data-bind="text: match.enfermedad()"   ></input></td>
				         <td data-bind="text: match.tipo_diagnostico()"       ></input></td>
				         <td data-bind="text: match.estudio()"            ></input></td>
				      </tr>
				   </tbody>
				</table>
				<br></br>
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
