@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid text-primary">
        <h1 class="mt-4">Proveedores
            <a href="{{ route('proveedor.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card border-primary mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Proveedores</div>
            <div class="card-body">
                
                @include('compras.proveedor.alerts')
                                
                @include('compras.proveedor.search')  
                <div class="table-responsive">
                    <table class="table table-bordered text-primary" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>tipo_persona</th>
                                <th>nombre</th>
                                <th>tipo_documento</th>
                                <th>num_documento</th>
                                <th>direccion</th>                                
                                <th>telefono</th>                                
                                <th>email</th> 
                                <th>update</th> 
                                <th>delete</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>tipo_persona</th>
                                <th>nombre</th>
                                <th>tipo_documento</th>
                                <th>num_documento</th>
                                <th>direccion</th>                                
                                <th>telefono</th>                                
                                <th>email</th>                                 
                                <th>update</th> 
                                <th>delete</th>                                
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataPersona as $key=>$value)
                                <tr>
                                    <td>
                                        <a href="{{ route('proveedor.show', $value->idpersona) }}">{{ $value->idpersona }}</a>                                        
                                    </td>
                                    <td>{{ $value->tipo_persona }}</td>
                                    <td>{{ $value->nombre }}</td>
                                    <td>{{ $value->tipo_documento }}</td>
                                    <td>{{ $value->num_documento }}</td>
                                    <td>{{ $value->direccion }}</td>
                                    <td>{{ $value->telefono }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        <a href="{{ route('proveedor.edit', $value->idpersona) }}" class="btn btn-success btn-sm">Editar</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->idpersona }}">Eliminar</button>
                                        @include('compras.proveedor.modal_delete')
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        Showing {{ $dataPersona->firstItem() }} to {{ $dataPersona->lastItem() }} of {{ $dataPersona->total() }} entries        
                        {{ $dataPersona->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection
