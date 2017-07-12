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
                        <th colspan="2">Acciones</th>
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
														<td>{!!Form::model($pacient,['route'=>['pacient.destroy',$pacient->id],'method'=>'DELETE'])!!}
										          <button type="submit" onclick="return confirm('¿Realmente desea eliminar Paciente?')" class="btn btn-danger btn-sm">Eliminar Paciente</button>
										        </td>
                        </tr>
                    @include('pacients.modal')
                    @endforeach
                </table>
            </div>
            {{$pacients->render()}}
        </div>
    </div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Detalle de paciente</h4>
		      </div>
		      <div class="modal-body">
		        @include('pacients.forms.pacient_modal')
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
