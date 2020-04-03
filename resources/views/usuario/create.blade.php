@include('usuario.role')
@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Usuarios</h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Usuarios</div>
            <div class="card-body">

                @include('usuario.alerts')

                <form method="POST" action="{{ route('usuario.store') }}">
                    @csrf
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                        <div class="col-md-5">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Email:</label>
                        <div class="col-md-5">
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Password:</label>
                        <div class="col-md-5">
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Confirmar Password:</label>
                        <div class="col-md-5">
                            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2">Role:</label>
                        <div class="col-md-5">
                            <select name="role_id" class="form-control">
                                @foreach($dataRole as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4>
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>                        
                        <a href="{{ route('usuario.index') }}" class="btn btn-primary">Atras</a>    
                    </h4>
                </form>                    

            </div>
        </div>
    </div>
@endsection
