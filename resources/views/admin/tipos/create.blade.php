@extends('layouts.admin')
@section('content')

<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.tipos.index") }}'>Tipos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Nuevo Tipo</li>
          
      @endcomponent
  </div>
<div class="card">
     <div class="card-header">
          <h5 class="text-center ">CREAR NUEVO TIPO</h5>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tipos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="text" id="nombre" name="nombre" class="validarletras form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}">           
            </div>

            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">Descripcion</label>
                <textarea type="text" id="descripcion" name="descripcion" class=" form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" value="{{ old('descripcion') }}"></textarea>
                          
            </div>

            <div class="form-group {{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">Tipo*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="tipo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $tipo)
                            <option value="{{$tipo}}">{{$tipo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
               
             <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.tipos.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
        </form>
    </div>
</div>
@endsection