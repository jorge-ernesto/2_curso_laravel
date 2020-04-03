@include('usuario.role')
@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Usuarios
            <a href="{{ route('usuario.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Usuarios</div>
            <div class="card-body">
                
                @include('usuario.alerts')
                                
                @include('usuario.search')  
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">name</th>
                                <th class="text-primary">email</th>
                                <th class="text-primary">role</th>
                                <th class="text-primary">created_at</th>
                                <th class="text-primary">updated_at</th>    
                                <th class="text-primary">updated</th>    
                                <th class="text-primary">delete</th>    
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">user</th>
                                <th class="text-primary">email</th>
                                <th class="text-primary">role</th>
                                <th class="text-primary">created_at</th>
                                <th class="text-primary">updated_at</th>
                                <th class="text-primary">updated</th>    
                                <th class="text-primary">delete</th>                                     
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataUsuario as $key=>$value)
                                <tr>
                                    <td>
                                        <a href="{{ route('usuario.show', $value->id) }}">{{ $value->id }}</a>                                        
                                    </td>
                                    <td>{{ $value->user }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->role }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('usuario.edit', $value->id) }}" class="btn btn-warning btn-sm">Editar</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->id }}">Eliminar</button>
                                        @include('usuario.modal_delete')
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        Showing {{ $dataUsuario->firstItem() }} to {{ $dataUsuario->lastItem() }} of {{ $dataUsuario->total() }} entries        
                        {{ $dataUsuario->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection
