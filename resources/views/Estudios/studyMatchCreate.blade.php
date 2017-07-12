@extends('layouts.admin')
@section('contenido')
    <div class="row">
   {!!Form::open()!!}
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
          @include('Estudios.forms.studyMatch')
    {!!Form::close()!!}
  </div>
  @section('js')
    {!!Html::script('js/estudios.js')!!}
  @stop
@stop
