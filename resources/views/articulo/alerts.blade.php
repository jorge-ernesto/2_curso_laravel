{{-- Alertas --}}
@if( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif

@if( session('mensaje_eliminado') )
    <div class="alert alert-danger">{{ session('mensaje_eliminado') }}</div>
@endif

{{-- Errores --}}
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach    
        </ul>
    </div>
@endif           
{{-- Fin Errores --}}
{{-- Fin Alertas --}}