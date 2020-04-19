@include('articulo.role')
@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid text-primary">
        <h1 class="mt-4">Artículos</h1>        
        <div class="card border-primary mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Artículos</div>
            <div class="card-body">

                @include('articulo.alerts')

                <form method="POST" action="{{ route('articulo.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Categoría:</label>
                        <div class="col-md-5">
                            <select name="idcategoria" class="form-control">
                                @foreach($dataCategoria as $item)
                                    <option value="{{ $item->idcategoria }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Código:</label>
                        <div class="col-md-5">
                            <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                        <div class="col-md-5">
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Stock:</label>
                        <div class="col-md-5">
                            <input type="text" name="stock" class="form-control" value="{{ old('stock') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Descripción:</label>
                        <div class="col-md-5">
                            <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Imagen:</label>
                        <div class="col-md-5">
                            <div class="custom-file">
                                <input type="file" name="imagen" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <h4>
                        <button type="submit" class="btn btn-primary">Crear Artículo</button>                        
                        <a href="{{ route('articulo.index') }}" class="btn btn-primary">Atras</a>    
                    </h4>
                </form>                    

            </div>
        </div>
    </div>
@endsection
