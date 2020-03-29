@extends('layout.plantilla')

@section('seccion-main')    
    
    @foreach($dataCategoria as $key=>$value)
        {{ $value->nombre }}
    @endforeach

@endsection
