@extends('layouts.plantilla')

@section('seccion-main')    
    <div class="container-fluid text-primary">
        <h1 class="mt-4">Roles</h1>        
        <div class="card border-primary mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Roles</div>
            <div class="card-body">

                @include('acceso.role.alerts')

                <form method="POST" action="{{ route('role.update', $role->id) }}">
                    @csrf
                    @method('PUT')                    
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                        <div class="col-md-5">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Slug:</label>
                        <div class="col-md-5">
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $role->slug) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Descripcion:</label>
                        <div class="col-md-5">                            
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $role->description) }}</textarea>
                        </div>
                    </div>    

                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Full access:</label>
                        <div class="col-md-5 my-auto">                            
                            @php                                
                                $checked = "no";
                                if(old('full-access')){                                    
                                    if(old('full-access') == "yes"){
                                        $checked = "yes";
                                    } 
                                }else{
                                    if($role['full-access'] == "yes"){
                                        $checked = "yes";
                                    } 
                                }
                            @endphp

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes" @if($checked=="yes") checked @endif onclick="toggle(true)">
                                <label class="custom-control-label" for="fullaccessyes">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" @if($checked=="no") checked @endif onclick="toggle(false)">
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>                            
                        </div>
                    </div> 

                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-2">Permissions List:</label>
                        <div class="col-md-5 my-auto">                            
                            @foreach ($permisos as $key=>$permiso)
                                @php
                                    $permisos_ = old('permisos') ? old('permisos') : $permisos_;                                                                      
                                    $checked = "";
                                    if((!empty($permisos_) && is_array($permisos_) && isset($permisos_)) && in_array($permiso->id, $permisos_)){
                                        $checked = "checked";
                                    }
                                @endphp

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="permiso_{{$permiso->id}}" value="{{$permiso->id}}"" name="permisos[]" {{$checked}}>
                                    <label class="custom-control-label" for="permiso_{{$permiso->id}}">
                                        {{$permiso->id ." - ". $permiso->name}}
                                        (<em>{{$permiso->description}}</em>)
                                    </label>
                                </div>
                            @endforeach                                                    
                        </div>
                    </div>

                    <h4>
                        <button type="submit" class="btn btn-primary">Crear Categoría</button>                        
                        <a href="{{ route('role.index') }}" class="btn btn-primary">Atras</a>    
                    </h4>
                </form>                    

            </div>
        </div>
    </div>
    <!-- Verificar los datos de regreso (old), dd no detiene la ejecucion -->
    {{-- {{ dd(old()) }} --}}
@endsection

@section('seccion-scripts')    
    <script>
        function toggle(checked) {
            $("input[type=checkbox]").each(function(){                
                $(this).prop('checked', checked);
            });
        }
    </script>
@endsection