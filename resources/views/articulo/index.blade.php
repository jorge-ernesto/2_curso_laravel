@extends('layout.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Articulos
            <a href="{{ route('articulo.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Articulos</div>
            <div class="card-body">
                
                @include('articulo.alerts')
                                
                @include('articulo.search')  
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">categoria</th>
                                <th class="text-primary">codigo</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">stock</th>
                                <th class="text-primary">descripcion</th>                                
                                <th class="text-primary">imagen</th>                                
                                <th class="text-primary">estado</th>                                
                                <th class="text-primary">update</th>                                
                                <th class="text-primary">delete</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">categoria</th>
                                <th class="text-primary">codigo</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">stock</th>
                                <th class="text-primary">descripcion</th>                                
                                <th class="text-primary">imagen</th>                                
                                <th class="text-primary">estado</th>                                
                                <th class="text-primary">update</th>                                
                                <th class="text-primary">delete</th>                                
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataArticulo as $key=>$value)
                                <tr>
                                    <td>
                                        <a href="{{ route('articulo.show', $value->idarticulo) }}">{{ $value->idarticulo }}</a>                                        
                                    </td>
                                    <td>{{ $value->categoria }}</td>
                                    <td>{{ $value->codigo }}</td>
                                    <td>{{ $value->nombre }}</td>
                                    <td>{{ $value->stock }}</td>
                                    <td>{{ $value->descripcion }}</td>
                                    <td>
                                        <img src="{{ asset('imagenes/articulos/' . $value->imagen) }}" alt="" width="100">
                                    </td>
                                    <td>{{ $value->estado }}</td>
                                    <td>
                                        <a href="{{ route('articulo.edit', $value->idarticulo) }}" class="btn btn-warning btn-sm">Editar</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->idarticulo }}">Eliminar</button>
                                        @include('articulo.modal_delete')
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        Showing {{ $dataArticulo->firstItem() }} to {{ $dataArticulo->lastItem() }} of {{ $dataArticulo->total() }} entries        
                        {{ $dataArticulo->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection
