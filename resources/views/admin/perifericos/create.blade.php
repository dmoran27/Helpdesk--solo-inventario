

@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.perifericos.index") }}'>Perifericos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Nuevo Periferico </li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">AGREGAR UN PERIFERICO</h5>
    </div>
    <div class="card-body">
       <form action="{{ route('admin.perifericos.store') }}" method="POST"  class="container-fluid formulario-ajax" >
            @csrf
        <div class="row">
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="nombre2">Nombre:*</label>
                <input type="text" id="nombre2" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}">
                             
            </div>   
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">identificador:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('identificador') }}">
                               
            </div> 
            <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Tipo:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} " name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
            <div class="form-group {{ $errors->has('perteneciente')}} col-12 col-md-6">
                <label for="perteneciente" class=" col-form-label text-md-right">Pertenece a la UNEXPO?*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $perteneciente)
                            <option value="{{$perteneciente}}">{{$perteneciente}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado')}} col-12 col-md-6">
                <label for="estado" class=" col-form-label text-md-right">Estado del equipo:*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $estado)
                            <option value="{{$estado}}">{{$estado}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <textarea type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion') }}">{{ old('observacion') }}</textarea> 
                              
            </div>               
        </div>
                 
         <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.perifericos.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" id="guardar-periferico" value="Guardar">
          </div>
        </form>
       
    </div>
</div>


@endsection
