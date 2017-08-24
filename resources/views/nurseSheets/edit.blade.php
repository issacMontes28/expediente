@extends('layouts.admin')
@section('contenido')
@include('nurseSheets.forms.barra')
@include('alerts.request')
<div>
<h4 align="center">Datos de la hoja de enfermería para <?php echo $info["paciente"]; ?></h4>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Somatometría</a></li>
	  <li><a href="#tab2" data-toggle="tab" data-bind="click: $root.mostrarP, visible: visible_habitus() == 0"> Hábitus exterior</a></li>
    <li><a href="#tab3" data-toggle="tab" data-bind="click: $root.mostrarMedicamentos, visible: visible_medicamentos() == 0"> Medicamentos administrados</a></li>
    <li><a href="#tab4" data-toggle="tab" data-bind="click: $root.mostrarActuals, visible: visible_actuals() == 0"> Medicamentos actuales</a></li>
</ul>
  <form id="formulario_hde">
     <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
     <input type="hidden" name="id_nursesheet" value="<?php echo $info["nursesheet"]["id"] ?>" id="id_nursesheet"></input>
     <div class="tab-content">
       <div class="tab-pane active"  id="tab1">
         @include('nurseSheets.forms.nursesheet_edit_somatometria')
         <div align="center">
           <br>
           <a class="btn btn-primary  btn-lg btnNext"
             data-bind="click: $root.mostrarHabitus, visible: visible_P() == 1"
             data-bind="click: $root.mostrarHabitus, visible: visible_habitus() == 0" >
             Siguiente
           </a>
         </div>
       </div>
       <div class="tab-pane" id="tab2">
         @include('nurseSheets.forms.nursesheet_edit_habitus')
         <div class="row">
           <br>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
             <a class="btn btn-primary  btn-lg btnPrevious"
               data-bind="click: $root.ocultarHabitus, visible: visible_P() == 1">
               Anterior
             </a>
           </div>
         </div>
       </div>
      <div class="tab-pane" id="tab3">
  			@include('nurseSheets.forms.nursesheet_edit_medicamentos')
  			<div class="row">
  				<br>
  				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
  					<a 	class="btn btn-primary btn-lg btnPrevious"
  						data-bind="click: $root.ocultarMedicamentos, visible: visible_medicamentos() == 1" >
  						Anterior
  					</a>
  					<a 	class="btn btn-primary btn-lg  btnNext"
  						data-bind="click: $root.mostrarActuals, visible: visible_habitus() == 0">
  						Siguiente
  					</a>
  				</div>
  			</div>
		 </div>
		<div class="tab-pane" id="tab4">
			@include('nurseSheets.forms.nursesheet_edit_actuals')
			<div class="form-group" align="center">
				<br>
				<a class="btn btn-primary btn-lg btnPrevious"
        data-bind="click: $root.ocultarActuals, visible: visible_actuals() == 1">Anterior</a>
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
	{!!Html::script('js/nursesheet_edit.js')!!}
@endsection
