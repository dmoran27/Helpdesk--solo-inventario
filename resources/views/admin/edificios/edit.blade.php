@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.edificios.index") }}'>Edificios</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Editar Edificio:  {{ $edificio->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">ACTUALIZAR EDIFICIO.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.edificios.update", [$edificio->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="textedificio" id="nombre" name="nombre" class="validarletras form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre', isset($edificio) ? $edificio->nombre : '') }}">
               
            </div>
           
            <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
             <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.edificios.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </form>
    </div>
</div>

@endsection