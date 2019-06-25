@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.areas.index") }}'>Areas</a></li>
        <li class="breadcrumb-item active" > Editar area:  {{ $area->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
   <div class="card-header">
          <h5 class="text-center ">EDITAR UN AREA</h5>
    </div>
    <div class="card-body">
        <form action='{{ route("admin.areas.update", [$area->id]) }}' method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="text" id="nombre" name="nombre" class="validarletras form-control{{$errors->has('descripcion') ? ' is-invalid' : '' }}" value="{{ old('nombre', isset($area) ? $area->nombre : '') }}">
               
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">Descripcion*</label>
                <textarea id="descripcion" name="descripcion" class=" validarletras form-control{{$errors->has('descripcion') ? ' is-invalid' : '' }}" value="{{ old('descripcion', isset($area) ? $area->descripcion : '') }}">{{$area->descripcion }}</textarea> 
               
            </div>
             

            <!--*           Errores         -->
            @include('partials.widget.errors')
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.areas.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Actualizar  ">
                 
            </div>        </form>
    </div>
</div>

@endsection