@extends('layouts.admin')
@section('content')

<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.dependencias.index") }}'>Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Editar Rol:  {{ $role->title ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">ACTUALIZAR DATOS DE ROL.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.roles.update", [$role->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Nombre*</label>
                <input type="text" id="title" name="title" class="validarletras  form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title', isset($role) ? $role->title : '') }}">
              
            </div>
            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                <label for="permissions">Permiso*
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Deseleccionar todo</span></label>
                <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple">
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                            {{ $permissions }}
                        </option>
                    @endforeach
                </select>
                
            </div>
            
            <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
              <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.roles.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </form>
    </div>
</div>

@endsection