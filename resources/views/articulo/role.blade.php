@if( session('articulo') )        
    {{-- Mostramos la pagina --}}
@else    
    <script type="text/javascript">
        window.location.href = "/404";
    </script>
@endif