@if( session('proveedor') )        
    {{-- Mostramos la pagina --}}
@else    
    <script>
        window.location.href = "/404";
    </script>
@endif