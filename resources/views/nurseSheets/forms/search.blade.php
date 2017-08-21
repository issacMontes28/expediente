<div class="panel-body">
   {!! Form::open(['route'=>'fecha_nursesheet',
     'method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}
     <div class="form-group">
       {!!Form::label('fecha_1','Buscar hojas de enfermería por fecha de creación:')!!}
       {!! Form::date('fecha1',null, ['class'=>'form-control']) !!}
     </div>
     <button type="submit" class="btn btn-success">Buscar</button>
   {!! Form::close() !!}
</div>
