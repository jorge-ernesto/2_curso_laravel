@include('acceso.usuario.role')
@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid text-primary">
        <h1 class="mt-4">Cambiar contraseña de Usuario: {{$dataUsuario->name}}</h1>        
        <div class="card border-primary mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Usuario</div>
            <div class="card-body">

                @include('acceso.usuario.alerts')

                <form method="POST" action="{{ route('usuario.changePassword', $dataUsuario->id) }}">
                    @method('PUT')
                    @csrf                    
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Password:</label>
                        <div class="col-md-5">
                            <input type="password" name="password" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Confirmar Password:</label>
                        <div class="col-md-5">
                            <input type="password" name="password_confirmation" class="form-control" value="">
                        </div>
                    </div>                    
                    <h4>
                        <button type="submit" id="crear" class="btn btn-primary">Editar Usuario</button>                        
                        <a href="{{ route('usuario.index') }}" class="btn btn-primary">Atras</a>    
                    </h4>                
                </form>

            </div>
        </div>
    </div>
@endsection
