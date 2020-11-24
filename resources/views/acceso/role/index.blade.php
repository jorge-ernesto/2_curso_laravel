@include('acceso.role.role')
@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid text-primary">
        <h1 class="mt-4">Roles
            <a href="{{ route('role.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card border-primary mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Roles</div>
            <div class="card-body">
                
                @include('acceso.role.alerts')
                                
                @include('acceso.role.search')  
                <div class="table-responsive">
                    <table class="table table-bordered text-primary" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>slug</th>
                                <th>description</th>
                                <th>full-access</th>   
                                <th>update</th>                             
                                <th>delete</th>                             
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>slug</th>
                                <th>description</th>
                                <th>full-access</th>  
                                <th>update</th>                             
                                <th>delete</th>           
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataRole as $key=>$value)
                                <tr>
                                    <td>
                                        <a href="{{ route('role.show', $value->id) }}">{{ $value->id }}</a>
                                    </td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->slug }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value['full-access'] }}</td>                                    
                                    <td>
                                        <a href="{{ route('role.edit', $value->id) }}" class="btn btn-success btn-sm">Editar</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->id }}">Eliminar</button>
                                        @include('acceso.role.modal_delete')
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        Mostrando registros del {{ $dataRole->firstItem() }} al {{ $dataRole->lastItem() }} de un total de {{ $dataRole->total() }} registros        
                        {{ $dataRole->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection