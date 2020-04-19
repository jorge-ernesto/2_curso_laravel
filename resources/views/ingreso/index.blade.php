@include('ingreso.role')
@extends('layouts.plantilla')    

@section('seccion-main')    
    <div class="container-fluid text-primary">
        <h1 class="mt-4">Ingreso
            <a href="{{ route('ingreso.create') }}" class="btn btn-primary">Crear</a>              
        </h1>        
        <div class="card border-primary mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Ingreso</div>
            <div class="card-body">
                
                @include('ingreso.alerts')
                                
                @include('ingreso.search')  
                <div class="table-responsive">
                    <table class="table table-bordered text-primary" width="100%" cellspacing="0"> <!-- id="dataTable" -->
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>proveedor</th>
                                <th>tipo_comprobante</th>
                                <th>serie_comprobante</th>
                                <th>num_comprobante</th>                                
                                <th>fecha_hora</th>                                
                                <th>impuesto</th>                                
                                <th>estado</th>                                
                                <th>total</th> 
                                <th>show</th>
                                <th>delete</th>                                                                  
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>proveedor</th>
                                <th>tipo_comprobante</th>
                                <th>serie_comprobante</th>
                                <th>num_comprobante</th>                                
                                <th>fecha_hora</th>                                
                                <th>impuesto</th>                                
                                <th>estado</th>                                
                                <th>total</th>    
                                <th>show</th>
                                <th>delete</th>
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
                                    <td>
                                        @if( $value->estado == "Aceptado" )
                                            <span class="badge badge-primary">{{ $value->estado }}</span>
                                        @else
                                            <span class="badge badge-dark">{{ $value->estado }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $value->total }}</td>
                                    <td>
                                        <a href="{{ route('ingreso.show', $value->idingreso) }}" class="btn btn-primary btn-sm">Ver</a>                                        
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modal_delete_{{ $value->idingreso }}">Eliminar</button>
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
