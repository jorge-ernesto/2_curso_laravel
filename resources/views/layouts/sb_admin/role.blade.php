@if( session('role') )
    {{-- Ya se le asigno role --}}
@else
    <?php $dataRole = Auth::user()->roles()->get(); ?>    
    <?php error_log("****** dataRole ******"); ?>
    <?php error_log(json_encode($dataRole)); ?>

    @foreach($dataRole as $key=>$role)                        
        @if($role->name == "ROLE_ADMIN")                            
            <?php
            session(['role' => true]);
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
            session(['role' => true]);
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
            session(['role' => true]);
            session(['categoria' => true]);
            session(['articulo' => true]);
            ?>
        @endif
    @endforeach
@endif
