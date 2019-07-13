@extends('layouts.admin')
@section('content')
 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.clientes.index") }}'>Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Editar Usuario:  {{ $cliente->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">ACTUALIZAR DATOS DEL USUARIO</h5>
    </div>

    <div class="card-body">
        <form action='{{ route("admin.clientes.update", [$cliente->id]) }}' method="POST" enctype="multipart/form-data">
            <div class="row">
            @csrf
            @method('PUT')

            <div class="form-group col-12 col-md-6 col-lg-4  {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.cliente.fields.nombre') }}*</label>
                <input type="text" id="nombre"  name="nombre" class="validarletras form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre', isset($cliente) ? $cliente->nombre : '') }}">

            </div>
            <div class="form-group col-12 col-md-6 col-lg-4  {{ $errors->has('apellido') ? 'has-error' : '' }}">
                <label for="apellido">{{ trans('global.cliente.fields.apellido') }}*</label>
                <input type="text" id="apellido"  name="apellido" class="validarletras form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ old('apellido', isset($cliente->apellido) ? $cliente->apellido : '') }}">
                
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4  {{ $errors->has('cedula') ? 'has-error' : '' }}">
                <label for="cedula">{{ trans('global.cliente.fields.cedula') }}*</label>
                <input type="number" id="cedula" name="cedula" class="validanumericos form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula', isset($cliente) ? $cliente->cedula : '') }}">
            </div>
            
           <div class="form-group col-12 col-md-6 col-lg-4  {{ $errors->has('sexo')}}">
                <label for="sexo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.sexo') }}*</label>

                <div class="">
                   
                    <select class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="sexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $sexo)
                            <option value="{{$sexo}}" @if($sexo === $cliente->sexo) selected @else '' @endif >{{$sexo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
             <div class="form-group col-12 col-md-6 col-lg-4  {{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.tipo') }}*</label>

                <div class="">
                   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="tipo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $tipo)
                            <option value="{{$tipo}}" @if($tipo === $cliente->tipo) selected @else '' @endif >{{$tipo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>


            <div class="form-group col-12 col-md-6 col-lg-4 {{ $errors->has('dependencia')}}">
                <label for="dependencia" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.dependencia') }}*</label>

                <div class="">
                   
                    <select class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="dependencia_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($dependencias as $dependencia)
                          <option value="{{ $dependencia->id}}" @if($dependencia->id=== $cliente->dependencia_id) selected @else '' @endif >{{$dependencia->nombre}}</option>
                      @endforeach
                    </select>

                </div>
            </div>
            

            <div class="form-group col-12 col-md-6 {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">{{ trans('global.cliente.fields.telefono') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="number"  id="telefono" class="validanumericos form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{isset($cliente->telefono) ? $cliente->telefono : '' }}">
                  </div>
            </div>



             <div class="form-group col-12 col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.cliente.fields.email') }}*</label>
                <div class="input-group">
                    <input type="text" id="email" required="" name="email"  required  class="validaremail form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                    value="{{$email[0]}}" aria-describedby="basic-addon2">
                    <span class="input-group-text"  id="basic-addon2">{{_('@unexpo.edu.ve')}}</span>
                  </div>
                            
            </div>
           

            <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
              <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.clientes.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </div>
        </form>
    </div>
</div>

@endsection