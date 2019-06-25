@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.areas.index") }}'>Areas</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Editar Dependencia:  {{ $area->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">AGREGAR UN AREA</h5>
    </div>



    <div class="card-body">
        <form action="{{ route("admin.areas.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
            <div class="form-group col-12  {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="text" id="nombre" name="nombre" class="validarletras   form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"value="{{ old('nombre') }}">
              
            </div>

            
            <div class="form-group  col-12 {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">Descripcion*</label>
                <textarea name="descripcion" id="descripcion"  class="form-control{{$errors->has('descripcion') ? ' is-invalid' : '' }}" cols="30" rows="10" value="{{ old('descripcion') }}"></textarea>

                
            </div>
          
  <!--*           Errores         -->
            @include('partials.widget.errors')
                 

            <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.areas.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </div>
        </form>
    </div>
</div>
@endsection