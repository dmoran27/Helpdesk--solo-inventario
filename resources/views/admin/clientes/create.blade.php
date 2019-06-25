@extends('layouts.admin')
@section('content')
 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.clientes.index") }}'>Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Nuevo Usuario </li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">AGREGAR UN USUARIO</h5>
    </div>

   

    <div class="card-body">
        <form action="{{ route("admin.clientes.store") }}" method="POST" enctype="multipart/form-data">
            <div class="row">
            
            @csrf

            <!--*           Input Nombre         -->
            <div class="form-group col-12 col-md-6 col-lg-4 {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.cliente.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="validarletras form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"  required  value="{{ old('nombre') }}">              
            </div>
            
            <!--*           Input Apellido         -->
            <div class="form-group col-12 col-md-6 col-lg-4 {{ $errors->has('apellido') ? 'has-error' : '' }}">
                <label for="apellido">{{ trans('global.cliente.fields.apellido') }}*</label>
                <input type="text" id="apellido" name="apellido" class="validarletras form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" required  value="{{ old('apellido') }}">             
            </div>

             <!--*           Input Cedula        -->
            <div class="form-group col-12 col-md-6 col-lg-4 {{ $errors->has('cedula') ? 'has-error' : '' }}">
                <label for="cedula">{{ trans('global.cliente.fields.cedula') }}*</label>
                <input type="number" id="cedula" name="cedula"  pattern="[0-9]{10}" class="validanumericos form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula') }}">                
            </div>

             <!--*           Select Sexo         -->
           <div class="form-group col-12 col-md-6 col-lg-4 {{ $errors->has('sexo')}}">
                <label for="sexo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.sexo') }}*</label>
                <div class="">   
                    <select class="w-100 form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }} select2" name="sexo"  tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $sexo)
                            <option value="{{$sexo}}">{{$sexo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>

             <!--*           Select Tipo         -->
            <div class="form-group col-12 col-md-6 col-lg-4 {{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.tipo') }}*</label>
                <div class="">   
                    <select class="w-100 form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="tipo"  tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $tipo)
                            <option value="{{$tipo}}">{{$tipo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
                 
            <!--*           Select Dependencia       -->
            <div class="form-group col-12 col-md-6 col-lg-4 {{ $errors->has('dependencia')}}">
                <label for="dependencia" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.dependencia') }}*</label>
                <div class="">   
                 
                    <select class="w-100 form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="dependencia_id"  tabindex="-1" aria-hidden="true">
                        @foreach($dependencias as $dependencia)
                            <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div>

             <!--*           Input Telefono       -->
              <div class="form-group col-12 col-md-6 {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">{{ trans('global.cliente.fields.telefono') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="number"  id="telefono"  pattern="[0-9]{10}" class="validanumericos form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}">
                  </div>
            </div>

             <!--*           Input Correo         -->
             <div class="form-group col-12 col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.cliente.fields.email') }}*</label>
                <div class="input-group">
                    <input type="text" id="email" required name="email"  class="validaremail form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" aria-describedby="basic-addon2">
                    <span class="input-group-text"  id="basic-addon2">{{_('@unexpo.com')}}</span>
                  </div>
                            
            </div>
            
             <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.clientes.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
        </div>
        </form>




    </div>
</div>
@endsection