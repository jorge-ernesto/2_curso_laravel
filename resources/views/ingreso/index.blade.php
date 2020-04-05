@include('ingreso.role')
@extends('layouts.plantilla')    

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4">Ingreso
            <a href="{{ route('ingreso.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Ingreso</div>
            <div class="card-body">
                
                @include('ingreso.alerts')
                                
                @include('ingreso.search')  
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">proveedor</th>
                                <th class="text-primary">tipo_comprobante</th>
                                <th class="text-primary">serie_comprobante</th>
                                <th class="text-primary">num_comprobante</th>                                
                                <th class="text-primary">fecha_hora</th>                                
                                <th class="text-primary">impuesto</th>                                
                                <th class="text-primary">estado</th>                                
                                <th class="text-primary">total</th> 
                                <th class="text-primary">show</th>
                                <th class="text-primary">delete</th>                                                                  
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-primary">id</th>
                                <th class="text-primary">proveedor</th>
                                <th class="text-primary">tipo_comprobante</th>
                                <th class="text-primary">serie_comprobante</th>
                                <th class="text-primary">num_comprobante</th>                                
                                <th class="text-primary">fecha_hora</th>                                
                                <th class="text-primary">impuesto</th>                                
                                <th class="text-primary">estado</th>                                
                                <th class="text-primary">total</th>    
                                <th class="text-primary">show</th>
                                <th class="text-primary">delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataIngreso as $key=>$value)
                                <tr>
                                    <td>
                                        <a href="{{ route('ingreso.show', $value->idingreso) }}">{{ $value->idingreso }}</a>                                        
                                    </td>
                                    <td>{{ $value->proveedor }}</td>
                                    <td>{{ $value->tipo_comprobante }}</td>
                                    <td>{{ $value->serie_comprobante }}</td>
                                    <td>{{ $value->num_comprobante }}</td>
                                    <td>{{ $value->fecha_hora }}</td>
                                    <td>{{ $value->impuesto }}</td>
                                    <td>{{ $value->estado }}</td>
                                    <td>{{ $value->total }}</td>
                                    <td>
                                        <a href="{{ route('ingreso.show', $value->idingreso) }}" class="btn btn-warning btn-sm">Ver</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->idingreso }}">Eliminar</button>
                                        @include('ingreso.modal_delete')
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        Showing {{ $dataIngreso->firstItem() }} to {{ $dataIngreso->lastItem() }} of {{ $dataIngreso->total() }} entries        
                        {{ $dataIngreso->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection
