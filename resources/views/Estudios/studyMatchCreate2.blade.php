@extends('layouts.admin')
@section('barra')
  @include('Estudios.forms.barra')
@endsection
@section('contenido')
    <div class="row">
   {!!Form::open()!!}
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
          @include('Estudios.forms.studyMatch')
    {!!Form::close()!!}
  </div>
  @section('js')
    {!!Html::script('js/matches.js')!!}
  @stop
@stop
