@extends('layouts.admin')
@include('dates.forms.barra')
@section('contenido')
@include('alerts.request')
   {!!Form::model($soap,['route'=>['soap.update',$soap->id],'method'=>'PUT'])!!}
      @include('soaps.forms.soap_edit')
       <button  type="submit" onclick="return confirm('¿Guardar cambios en el registro?')"
       class="btn btn-primary">Modificar</button>
    {!!Form::close()!!}
@stop
@section('js')
	{!!Html::script('js/typeahead/bloodhound.js')!!}
	{!!Html::script('js/typeahead/typeahead.jquery.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.min.js')!!}
	{!!Html::script('js/buscar_diagnostico.js')!!}
	{!!Html::script('js/soap_edit.js')!!}
@stop
