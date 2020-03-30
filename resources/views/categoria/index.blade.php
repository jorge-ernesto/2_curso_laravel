@extends('layout.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Categorias
            <a href="{{ route('categoria.create') }}" class="btn btn-primary">Crear</a>    
        </h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Categorias</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">descripcion</th>
                                <th class="text-primary">update</th>
                                <th class="text-primary">dete</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">nombre</th>
                                <th class="text-primary">descripcion</th>
                                <th class="text-primary">update</th>
                                <th class="text-primary">dete</th>                                
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
                                        <a href="{{ route('categoria.destroy', $value->idcategoria) }}" class="btn btn-warning btn-sm">Eliminar</a>                                        
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
@endsection
