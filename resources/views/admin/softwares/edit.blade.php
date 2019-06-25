@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.softwares.index") }}'>Softwares</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Editar Software:  {{ $software->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">ACTUALIZAR DATOS DEL SOFTWARE</h5>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.softwares.update", [$software->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.software.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($software) ? $software->nombre : '') }}">
                
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('global.software.fields.descripcion') }}*</label>
                <textarea type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($software) ? $software->descripcion : '') }}">{{ old('descripcion', isset($software) ? $software->descripcion : '') }}</textarea>
                
            </div>
            <div class="form-group{{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.software.fields.tipo') }}*</label>

                <div class="">
                   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($tipos as $tipo)
                          <option value="{{ $tipo->id}}" @if($tipo->id === $software->tipo_id) selected @else '' @endif >{{$tipo->nombre}}</option>
                      @endforeach
                    </select>

                </div>
            </div>
           
            <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
              <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.softwares.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </form>
    </div>
</div>

@endsection