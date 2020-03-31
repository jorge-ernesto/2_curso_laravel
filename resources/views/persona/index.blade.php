@extends('layout.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Categorias
            <a href="{{ route('categoria.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Categorias</div>
            <div class="card-body">
                
                @include('categoria.alerts')
                                
                @include('categoria.search')  
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">descripcion</th>
                                <th class="text-primary">update</th>
                                <th class="text-primary">delete</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">descripcion</th>
                                <th class="text-primary">update</th>
                                <th class="text-primary">delete</th>                                
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataCategoria as $key=>$value)
                                <tr>
                                    <td>
                                        <a href="{{ route('categoria.show', $value->idcategoria) }}">{{ $value->idcategoria }}</a>                                        
                                    </td>
                                    <td>{{ $value->nombre }}</td>
                                    <td>{{ $value->descripcion }}</td>
                                    <td>
                                        <a href="{{ route('categoria.edit', $value->idcategoria) }}" class="btn btn-warning btn-sm">Editar</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->idcategoria }}">Eliminar</button>
                                        @include('categoria.modal_delete')
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        Showing {{ $dataCategoria->firstItem() }} to {{ $dataCategoria->lastItem() }} of {{ $dataCategoria->total() }} entries        
                        {{ $dataCategoria->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection
