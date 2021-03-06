@extends ('layouts.admin')
@section('barra')
  @include('Estudios.forms.barra')
@endsection
@section ('contenido')

  <div class="row">
    <div class="colg-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de estudios agregados</h3>
    </div>
      <div class="panel-body">
          @include('Estudios.forms.searchEstudio')
      </div>
  </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Folio</th>
                      <th>Acción</th>
                  </thead>
                  @foreach ($studies as $study)
                      <tr>
                        <td><?php echo $study->id; ?></td>
                        <td><?php echo $study->nombre; ?></td>
                        <td><?php echo $study->folio; ?></td>
                        <td>
                          <button  type="button" value="<?php  echo $study->id?>" Onclick="modificarestudio(this.value);" class="btn btn-primary btn-sm" data-toggle='modal' data-target='#myModal'>Modificar</a>
                        </td>
                      </tr>
                  @endforeach
              </table>
          </div>
        </div>
        {{$studies->render()}}
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Detalle de estudio</h4>
          </div>
          <div class="modal-body">
            @include('Estudios.forms.study_modificar')
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')
	{!!Html::script('js/popup.js')!!}
@stop
