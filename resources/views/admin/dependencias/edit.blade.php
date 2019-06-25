@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.dependencias.index") }}'>Dependencias</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Editar Dependencia:  {{ $dependencia->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">ACTUALIZAR DATOS DE DEPENDENCIA.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.dependencias.update", [$dependencia->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="text" id="nombre" name="nombre" class="validarletras form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre', isset($dependencia->nombre) ? $dependencia->nombre : '') }}">
               
            </div>
             <div class="form-group {{ $errors->has('piso')  ? 'has-error' : ''}}">
                <label for="piso" class=" col-form-label text-md-right">Piso*</label>
                <div class="">   
                    <select id="piso" class="form-control{{ $errors->has('piso') ? ' is-invalid' : '' }} w-100" name="piso" tabindex="-1" aria-hidden="true">
                        @for ($i = 0; $i <= 9; $i++)
                            <option value="{{$i}}" @if($dependencia->piso== $i) selected @else '' @endif>{{ $i }}</option>
                        @endfor
                       
                      
                      </select>
                </div>
            </div>
             <div class="form-group {{ $errors->has('edificio') ? 'has-error' : '' }}">
                <label for="edificio" class=" col-form-label text-md-right">Edificio*</label>
                <div>
                    <select name="edificio_id" id="edificio" class="form-control{{ $errors->has('piso') ? ' is-invalid' : '' }} select2 w-100" name="edificio_id"  tabindex="-1" aria-hidden="true">
                         @foreach($edificios as $edificio)
                          <option value="{{ $edificio->id}}" @if($edificio->id === $dependencia->edificio_id) selected @else '' @endif >{{$edificio->nombre}}</option>
                      
                        @endforeach
                    </select>
                </div>
            
                
            </div>
           
 <!--*           Errores         -->
            @include('partials.widget.errors')

            <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.dependencias.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
            
          </form>
    </div>
</div>

@endsection