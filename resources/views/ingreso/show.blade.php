@include('ingreso.role')
@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid">
        <h1 class="mt-4 text-primary">Ingresos</h1>        
        <div class="card border-primary mb-4">
            <div class="card-header text-primary"><i class="fas fa-table mr-1"></i>Ingresos</div>
            <div class="card-body text-primary">

                @include('ingreso.alerts')

                {{-- <form method="POST" action="{{ route('ingreso.store') }}"> --}}
                    {{-- @csrf --}}
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Proveedor:</label>
                        <div class="col-md-5">
                            <select name="idproveedor" class="form-control">
                                @foreach($dataPersona as $item)
                                    @if($item->idpersona == $dataIngreso->idproveedor)
                                        <option value="{{ $item->idpersona }}" selected>{{ $item->nombre }}</option>
                                    @else
                                        <option value="{{ $item->idpersona }}">{{ $item->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Tipo de comprobante:</label>
                        <div class="col-md-5">
                            <select name="tipo_comprobante" class="form-control">
                                <option value="Boleta">Boleta</option>
                                <option value="Factura">Factura</option>                                
                                <option value="Ticket">Ticket</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Serie de comprobante:</label>
                        <div class="col-md-5">
                            <input type="text" name="serie_comprobante" class="form-control" value="Synthesis 001" readonly>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Numero de comprobante:</label>
                        <div class="col-md-5">
                            <input type="text" name="num_comprobante" class="form-control" value="Autogenerado" readonly>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Impuesto:</label>
                        <div class="col-md-5">
                            <input type="number" name="impuesto" class="form-control" value="18" min="1" step="any" placeholder="Impuesto">
                        </div>
                    </div>

                    <div class="card border-primary mb-3">                        
                        <div class="card-body text-primary">
                            
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="nombre">Articulo</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-size="5" 
                                            id="idarticulo">
                                        @foreach($dataArticulo as $item)
                                            <option value="{{ $item->idarticulo }}">{{ $item->articulo }}</option>
                                        @endforeach                                                                    
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nombre">Cantidad</label>
                                    <input type="number" class="form-control" value="1" min="1" required placeholder="Cantidad" 
                                           id="cantidad">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nombre">Precio compra</label>
                                    <input type="text" class="form-control" value="1" pattern="[-+]?[0-9]*[.]?[0-9]+" required placeholder="Precio compra" {{-- Antes tenia estas caracteristicas: type="number" min="1" step="any" required --}}
                                           id="precio_compra">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nombre">Precio venta</label>
                                    <input type="text" class="form-control" value="1" pattern="[-+]?[0-9]*[.]?[0-9]+" required placeholder="Precio venta" 
                                           id="precio_venta">
                                </div>
                                <a class="btn btn-primary btn-sm" href="javascript:agregar()">Agregar</a>
                            </div>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-primary">
                            <thead>
                                <tr>
                                    <th class="d-none">ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio compra</th>
                                    <th>Precio venta</th>                                    
                                    <th>Total</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>                            
                            <tbody id="cargarDetalle">
                            </tbody>
                        </table>
                    </div>
                    <h5 class="float-right clearfix">Total
                        <span class="badge badge-dark" id="granTotal">Total</span>
                    </h5>

                    <h4>
                        <button type="submit" class="btn btn-primary">Crear Ingreso</button>                        
                        <a href="{{ route('ingreso.index') }}" class="btn btn-primary">Atras</a>    
                    </h4>
                {{-- </form> --}}

            </div>
        </div>
    </div>
@endsection
