@extends('layouts.admin')
@section('contenido')
@include('soaps.forms.barra')
@include('alerts.request')
  {!!Form::open()!!}
     <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
     <input type="hidden" name="id_nursesheet" value="<?php echo $info["nursesheet"]["id"] ?>" id="id_nursesheet"></input>
     @include('nurseSheets.forms.nursesheet_edit')
   {!!Form::close()!!}
@endsection
@section('js')
	{!!Html::script('js/nursesheet_edit.js')!!}
@endsection
