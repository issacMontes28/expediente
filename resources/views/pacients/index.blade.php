@extends ('layouts.admin')
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
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>CURP</th>
                        <th>Acción</th>
                    </thead>
                    @foreach ($pacients as $pacient)
                        <tr>
                            <td>{{ $pacient->id}}</td>
                            <td>{{ $pacient->nombre}}</td>
                            <td>{{ $pacient->apaterno}}</td>
                            <td>{{ $pacient->amaterno}}</td>
                            <td>{{ $pacient->curp}}</td>
                            <td>
                                <a href="{{URL::action('PacientController@edit',$pacient->id)}}"><button class="btn btn-info">Editar</button></a>
                                <td>{!!Form::model($pacient,['route'=>['pacient.destroy',$pacient->id],'method'=>'DELETE'])!!}
           <button type="submit" onclick="return confirm('¿Realmente desea eliminar el registro?')" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @include('pacients.modal')
                    @endforeach
                </table>
            </div>
            {{$pacients->render()}}
        </div>
    </div>
@endsection
