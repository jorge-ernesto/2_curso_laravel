<?php $dataRole = Auth::user()->roles()->get(); ?>
@foreach($dataRole as $key=>$role)                        
    @if($role->name == "ROLE_ADMIN")                            
        <?php
        session(['categoria' => true]);
        session(['articulo' => true]);
        session(['cliente' => true]);
        session(['proveedor' => true]);                
        session(['ingreso' => true]);        
        session(['venta' => true]);
        session(['usuario' => true]);        
        ?>
    @endif    

    @if($role->name == "ROLE_USER")                            
        <?php
        session(['categoria' => true]);
        session(['articulo' => true]);
        session(['cliente' => true]);
        session(['proveedor' => true]);                
        session(['ingreso' => true]);        
        session(['venta' => true]);
        ?>
    @endif    

    @if($role->name == "ROLE_INVITADO")                            
        <?php
        session(['categoria' => true]);
        session(['articulo' => true]);
        ?>
    @endif
@endforeach
