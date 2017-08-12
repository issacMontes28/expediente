@extends ('layouts.admin')
@section('barra')
	@include('pacients.forms.barra')
@endsection
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Paciente</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif
			<form id="formulario_paciente">
		    {{Form::token()}}
				@include('pacients.forms.pacient')
				@include('pacients.forms.antecedentes_hf')
				@include('pacients.forms.antecedentes_pp')
				@include('pacients.forms.antecedentes_pnp')
					<div class="form-group">
						<button class="btn btn-primary" type="submit" data-bind="click: $root.submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
			</form>
		</div>
	</div>
@endsection
@section('js')
	{!!Html::script('js/pacientes.js')!!}
	{!!Html::script('js/create_nurseSheet.js')!!}
@stop
