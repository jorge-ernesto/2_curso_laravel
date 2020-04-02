@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Categorías</h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Categorías</div>
            <div class="card-body">

                @include('categoria.alerts')

                <form method="POST" action="{{ route('categoria.store') }}">
                    @csrf
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                        <div class="col-md-5">
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Descripción:</label>
                        <div class="col-md-5">
                            <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
                        </div>
                    </div>
                    <h4>
                        <button type="submit" class="btn btn-primary">Crear Categoría</button>                        
                        <a href="{{ route('categoria.index') }}" class="btn btn-primary">Atras</a>    
                    </h4>
                </form>                    

            </div>
        </div>
    </div>
@endsection
