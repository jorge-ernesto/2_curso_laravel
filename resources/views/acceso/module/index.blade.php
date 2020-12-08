@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid text-primary">
        <h1 class="mt-4">Modulos
            <a href="{{ route('module.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card border-primary mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Modulos</div>
            <div class="card-body">
                
                @include('acceso.module.alerts')
                                
                @include('acceso.module.search')  
                <div class="table-responsive">
                    <table class="table table-bordered text-primary" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                {{-- <th>id</th> --}}
                                <th>name</th>                                
                                <th>created_at</th>                             
                                <th>update_at</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                {{-- <th>id</th> --}}
                                <th>name</th>                                
                                <th>created_at</th>                             
                                <th>update_at</th>
                                <th>delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($modules as $key=>$value)
                                <tr>
                                    {{-- <td>{{ $value->id }}</td> --}}
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>                                    
                                    <td>  
                                        <form method="POST" action="{{ route('module.destroy', $value->id) }}">
                                            @method('DELETE')
                                            @csrf                                            
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estas seguro que quieres eliminar?');">Eliminar</button>                                
                                        </form>                                                                                
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        Mostrando registros del {{ $modules->firstItem() }} al {{ $modules->lastItem() }} de un total de {{ $modules->total() }} registros        
                        {{ $modules->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection