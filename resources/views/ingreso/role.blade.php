@if( session('ingreso') )        
    {{-- Display the page --}}    
@else    
    <script type="text/javascript">
        window.location = "/404";
    </script>
@endif