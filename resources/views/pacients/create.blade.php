@extends ('layouts.admin')
@section('barra')
	@include('pacients.forms.barra')
@endsection
@section ('contenido')

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

<ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Datos personales</a></li>
		<li><a href="#tab2" data-toggle="tab" >Antecedentes heredo-familiares</a></li>
    <li><a href="#tab3" data-toggle="tab" >Antecedentes personales patológicos</a></li>
    <li><a href="#tab4" data-toggle="tab" >Antecedentes personales no patológicos</a></li>
		<li><a href="#tab5" data-toggle="tab" >Antecedentes gineco-obstétricos</a></li>
</ul>
<form id="formulario_paciente">
	{{Form::token()}}
	<div class="tab-content">
		<div class="tab-pane active"  id="tab1">
			@include('pacients.forms.pacient')
			<br>
			<div align="center">
				<a 	class="btn btn-primary  btn-lg btnNext">
					Siguiente
				</a>
			</div>
		</div>
		<div class="tab-pane" id="tab2">
			@include('pacients.forms.antecedentes_hf')
			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a class="btn btn-primary  btn-lg btnPrevious">
						Anterior
					</a>
					<a class="btn btn-primary  btn-lg btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="tab3">
			@include('pacients.forms.antecedentes_pp')

			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="tab4">
			@include('pacients.forms.antecedentes_pnp')
			<div class="form-group" align="center">
				<br>
				<a class="btn btn-primary btn-lg btnPrevious">Anterior</a>
				<a 	class="btn btn-primary btn-lg  btnNext">
					Siguiente
				</a>
			</div>
		</div>
		<div class="tab-pane" id="tab5">
			@include('pacients.forms.antecedentes_go')
			<div class="form-group" align="center">
				<br>
				<a class="btn btn-primary btn-lg btnPrevious">Anterior</a>
				<button class="btn btn-primary 	btn-lg" type="submit" data-bind="click: $root.submit">Guardar</button>
				<button class="btn btn-danger 	btn-lg" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
</form>
@push('scripts')
	<script>
		$('.btnNext').click(function(){
			$('.nav-tabs > .active').next('li').find('a').trigger('click');
		});

		$('.btnPrevious').click(function(){
			$('.nav-tabs > .active').prev('li').find('a').trigger('click');
		});
	</script>
@endpush
@endsection
@section('js')
	{!!Html::script('js/pacientes.js')!!}
@stop
