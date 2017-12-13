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
  <div class="row">
    <div class="colg-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Pacientes</h3>
      <a href="pacient/create"><button class="btn btn-success">Nuevo paciente</button></a>
    </div>
      <div class="panel-body">
          @include('pacients.search')
      </div>
  </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>CURP</th>
                        <th colspan="2">Acción</th>
                    </thead>
                    @foreach ($pacients as $pacient)
                        <tr>
                            <td>{{ $pacient->nombre}}</td>
                            <td>{{ $pacient->apaterno}}</td>
                            <td>{{ $pacient->amaterno}}</td>
                            <td>{{ $pacient->curp}}</td>
                            <td>
															<button  type="button" value="<?php  echo $pacient->id?>" Onclick="mostrar(this.value);" class="btn btn-primary btn-sm" data-toggle='modal' data-target='#myModal'>Exhibir detalles</a>
                            </td>
														<td>
															{!!link_to_route('createNote', $title = 'Generar nota médica', $parameters = $pacient->id,
											          $attributes = ['class'=>'btn btn-primary btn-sm','style'=>"color:#FFFFFF"])!!}
                            </td>
                        </tr>
                    @include('pacients.modal')
									@endforeach
                </table>
            </div>
            {{$pacients->render()}}
        </div>
    </div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Detalle de paciente</h4>
		      </div>
		      <div class="modal-body">
						<div class="col col-sm-3">
								<ul class="nav nav-tabs nav-stacked text-center" role="tablist">
									<li role="presentation" class="active"><a href="#tab1" data-toggle="tab"> <p>Datos demográficos</p> </a></li>
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
							<div class="tab-content col-sm-9">
								<div class="tab-pane active"  id="tab1">
									@include('pacients.details.demograficos')
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
									@include('pacients.details.antecedentes_pp')

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
									@include('pacients.details.antecedentes_pnp')
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
									@include('pacients.details.antecedentes_go')
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
									@include('pacients.details.antecedentes_exploracionAPySis')

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
									@include('pacients.details.antecedenes_sintomasGenerales')

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
									@include('pacients.details.antecedentes_padecimientoActual')

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
									@include('pacients.details.antecedentes_somasometria')
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
									@include('pacients.details.antecedentes_exploracionGeneral')

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
									@include('pacients.details.antecedentes_exploracionRegional')

									<div class="form-group" align="center">
										<br>
										<a class="btn btn-primary btn-lg btnPrevious">Anterior</a>
										<button class="btn btn-primary 	btn-lg" type="submit" data-bind="click: $root.submit">Guardar</button>
										<button class="btn btn-danger 	btn-lg" type="reset">Cancelar</button>
									</div>
								</div>




							</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
		      </div>
		    </div>
		  </div>
		</div>
@endsection
@section('js')
	{!!Html::script('js/popup.js')!!}
@stop
