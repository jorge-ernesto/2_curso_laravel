@extends('layout.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="display-4 mt-4">Detalle de categoria:</h1>
        <h4>id: {{ $dataCategoria['idcategoria'] }}</h4>
        <h4>nombre: {{ $dataCategoria['nombre'] }}</h4>
        <h4>descripcion: {{ $dataCategoria['descripcion'] }}</h4>
        <h4>created_at: {{ $dataCategoria['created_at'] }}</h4>
        <h4>updated_at: {{ $dataCategoria['updated_at'] }}</h4>
        <h2>
            <a class="btn btn-primary" href="{{ route('categoria.index') }}">Atras</a>    
        </h2>
    </div>
@endsection
