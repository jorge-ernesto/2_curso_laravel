@if( session('role') )        
    {{-- Mostramos la pagina --}}
@else    
    <script>
        window.location.href = "/404";
    </script>
@endif