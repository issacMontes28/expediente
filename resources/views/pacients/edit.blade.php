@extends ('layouts.admin')
@section('barra')
	@include('pacients.forms.barra')
@endsection
@section ('contenido')
	<ul class="nav nav-tabs">
	    <li class="active"><a href="#tab1" data-toggle="tab">Datos personales</a></li>
			<li><a href="#tab2" data-toggle="tab" >Antecedentes heredo-familiares</a></li>
	    <li><a href="#tab3" data-toggle="tab" >Antecedentes personales patológicos</a></li>
	    <li><a href="#tab4" data-toggle="tab" >Antecedentes personales no patológicos</a></li>
			<li><a href="#tab5" data-toggle="tab" >Antecedentes gineco-obstétricos</a></li>
	</ul>
 {!!Form::model($pacient,['route'=>['pacient.update',$pacient->id],'method'=>'PUT'])!!}
	 {{Form::token()}}
 	<div class="tab-content">
 		<div class="tab-pane active"  id="tab1">
			@include('pacients.forms.pacient_edit')
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
				<button  type="submit" onclick="return confirm('¿Guardar cambios en el registro?')"
				class="btn btn-primary btn-lg">Modificar</button>
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
  {!!Form::close()!!}
@stop
@section('js')
	{!!Html::script('js/pacientes.js')!!}
@stop
