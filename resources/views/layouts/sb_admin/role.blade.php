<?php $dataUser = Auth::user()->roles()->get(); ?>
@foreach($dataUser as $key=>$value)                        
    @if($value->name == "ROLE_ADMIN")                            
        <?php
        session(['categoria' => true]);
        session(['articulo' => true]);
        session(['proveedor' => true]);        
        session(['cliente' => true]);
        session(['ingreso' => true]);        
        session(['usuario' => true]);        
        ?>
    @endif    

    @if($value->name == "ROLE_USER")                            
        <?php
        session(['categoria' => true]);
        session(['articulo' => true]);
        session(['proveedor' => true]);
        session(['cliente' => true]);
        session(['ingreso' => true]);                
        ?>
    @endif    

    @if($value->name == "ROLE_INVITADO")                            
        <?php
        session(['categoria' => true]);
        session(['articulo' => true]);
        ?>
    @endif
@endforeach
