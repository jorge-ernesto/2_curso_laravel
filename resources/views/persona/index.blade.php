@extends('layout.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Personas
            <a href="{{ route('persona.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Personas</div>
            <div class="card-body">
                
                @include('persona.alerts')
                                
                @include('persona.search')  
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">tipo_persona</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">tipo_documento</th>
                                <th class="text-primary">num_documento</th>
                                <th class="text-primary">direccion</th>                                
                                <th class="text-primary">telefono</th>                                
                                <th class="text-primary">email</th> 
                                <th class="text-primary">update</th> 
                                <th class="text-primary">delete</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">tipo_persona</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">tipo_documento</th>
                                <th class="text-primary">num_documento</th>
                                <th class="text-primary">direccion</th>                                
                                <th class="text-primary">telefono</th>                                
                                <th class="text-primary">email</th>                                 
                                <th class="text-primary">update</th> 
                                <th class="text-primary">delete</th>                                
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataPersona as $key=>$value)
                                <tr>
                                    <td>
                                        <a href="{{ route('persona.show', $value->idpersona) }}">{{ $value->idpersona }}</a>                                        
                                    </td>
                                    <td>{{ $value->tipo_persona }}</td>
                                    <td>{{ $value->nombre }}</td>
                                    <td>{{ $value->tipo_documento }}</td>
                                    <td>{{ $value->num_documento }}</td>
                                    <td>{{ $value->direccion }}</td>
                                    <td>{{ $value->telefono }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        <a href="{{ route('persona.edit', $value->idpersona) }}" class="btn btn-warning btn-sm">Editar</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->idpersona }}">Eliminar</button>
                                        @include('persona.modal_delete')
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
