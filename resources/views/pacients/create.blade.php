<style>
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-style: none; }
.nav-stacked > li + li {
    margin-top: 0px;
}
.nav-tabs > li > a {
    /*padding: 10px 50px 10px 50px !important;
    color: white;
    background-color: #001453;*/
	color: red;
    background-color: #014AB6;
    border-style: none;
    margin: 0;
}

.nav-tabs > li > a > p {
	color: white;
}

.nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
    background-color: #448AFF;
/*    color: #FFFFFF;*/
	color: black;
    z-index: 99;
    transition: all 0.5s ease 0s;
	border-style:none;
}

.nav-tabs > li > a:hover > p, .nav-tabs > li > a:focus > p {
    color: black;
}

.nav-tabs > li.active > a {
   color: #FFFFFF;
   background-color: white;
   z-index: 100;
}

.nav-tabs > li.active > a > p {
	color:black;
}

.nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
   color: #FFFFFF;
   background-color: white;
   border-color:white;
   transition: all 0.5s ease 0s;
}

.nav-tabs > li.active > a:hover > p, .nav-tabs > li.active > a:focus > p  {
   color: black;
}


</style>

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

<div class="row">
		<div class="col col-sm-3">
				<ul class="nav nav-tabs nav-stacked text-center" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" data-toggle="tab"> <p>Nuevo paciente</p> </a></li>
					<li role="presentation"><a href="#tab2" data-toggle="tab" > <p>Antecedentes - heredo familiares 				</p></a></li>
					<li role="presentation"><a href="#tab3" data-toggle="tab" > <p>Antecedentes - patológicos 						</p></a></li>
					<li role="presentation"><a href="#tab4" data-toggle="tab" > <p>Antecedentes - no patológicos 					</p></a></li>
					<li role="presentation"><a href="#tab5" data-toggle="tab" > <p>Antecedentes gineco - obstétricos 				</p></a></li>
					<li role="presentation"><a href="#tab6" data-toggle="tab" > <p>Interrogatorio por aparatos y sistemas 	 		</p></a></li>
					<li role="presentation"><a href="#tab7" data-toggle="tab" > <p>Síntomas generales						 		</p></a></li>
					<li role="presentation"><a href="#tab8" data-toggle="tab" > <p>Padecimiento actual						 		</p></a></li>
					<li role="presentation"><a href="#tab9" data-toggle="tab" > <p>Somasometría						 				</p></a></li>
					<li role="presentation"><a href="#tab10" data-toggle="tab" > <p>Inspección general						 		</p></a></li>
					<li role="presentation"><a href="#tab11" data-toggle="tab"> <p>Exploración física						 		</p></a></li>
				</ul>
			</div>
<form id="formulario_paciente">
	{{Form::token()}}
	<div class="tab-content col-sm-9">
		<div class="tab-pane active"  id="tab1">
			@include('pacients.forms.pacient')
			<div align="center">
				<br>
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

		<div class="tab-pane" id="tab5">
			@include('pacients.forms.antecedentes_go')
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

		<div class="tab-pane" id="tab6">
			@include('pacients.forms.antecedentes_exploracionAPySis')

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

		<div class="tab-pane" id="tab7">
			@include('pacients.forms.antecedenes_sintomasGenerales')

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

		<div class="tab-pane" id="tab8">
			@include('pacients.forms.antecedentes_padecimientoActual')

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

		<div class="tab-pane" id="tab9">
			@include('pacients.forms.antecedentes_somasometria')
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

		<div class="tab-pane" id="tab10">
			@include('pacients.forms.antecedentes_exploracionGeneral')

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


		<div class="tab-pane" id="tab11">
			@include('pacients.forms.antecedentes_exploracionRegional')

			<div class="form-group" align="center">
				<br>
				<a class="btn btn-primary btn-lg btnPrevious">Anterior</a>
				<button class="btn btn-primary 	btn-lg" type="submit" data-bind="click: $root.submit">Guardar</button>
				<button class="btn btn-danger 	btn-lg" type="reset">Cancelar</button>
			</div>
		</div>




	</div>

</form>

<button class="btn btn-primary 	btn-lg" id="bloqueo">Bloquear</button>
<div id="question" name="question" style="display:none; cursor: default">
</div>
@push('scripts')
	<script>

		$('.btnNext').click(function(){
			$('.nav-tabs > .active').next('li').find('a').trigger('click');
		});

		$('.btnPrevious').click(function(){
			$('.nav-tabs > .active').prev('li').find('a').trigger('click');
		});

		var sexo_pacient = "H";

		function selectSexo(sel){
			sexo_pacient = sel.value;
			if(sexo_pacient == "F" ){
				document.getElementById('antecedentes_go').style.display 		= 'block';
				document.getElementById('antecedentes_go_noaply').style.display = 'none';
			}else{
				document.getElementById('antecedentes_go').style.display 		= 'none';
				document.getElementById('antecedentes_go_noaply').style.display = 'block';
			}
		}

	</script>
@endpush

@endsection
@section('js')
	{!!Html::script('js/pacientes.js')!!}
	{!!Html::script('js/session.js')!!}
	{!!Html::script('js/bootbox.min.js')!!}
@stop
