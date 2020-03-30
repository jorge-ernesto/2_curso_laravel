@extends('layout.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Categorias</h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Categorias</div>
            <div class="card-body">

                <!-- Alertas -->                
                @if( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                @endif

                @error('nombre')
                    <div class="alert alert-danger">El nombre es requerido</div>        
                @enderror

                @if( $errors->has('descripcion') )
                    <div class="alert alert-danger">La descripción es requerida</div>
                @endif                
                <!-- Fin Alertas -->

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
                        <button type="submit" id="crear" class="btn btn-primary">Crear Categoría</button>                        
                        <a href="{{ route('categoria.index') }}" class="btn btn-primary">Atras</a>    
                    </h4>

                    <input type="hidden" name="id" class="form-control" value="">
                </form>                    

            </div>
        </div>
    </div>
@endsection