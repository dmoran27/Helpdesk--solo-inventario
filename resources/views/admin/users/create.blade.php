@extends('layouts.admin')
@section('content')
 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.users.index") }}'>Tecnicos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Nuevo Tecnico </li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">AGREGAR UN TECNICO</h5>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
         <div class="row">           
            <div class="col-12 col-md-6 col-lg-4 form-group{{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.user.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="validarletras form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}">
                               
            </div>

            <div class="col-12 col-md-6 col-lg-4 form-group{{ $errors->has('apellido') ? 'has-error' : '' }}">
                <label for="apellido">{{ trans('global.user.fields.apellido') }}*</label>
                <input type="text" id="apellido" name="apellido" class="validarletras form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ old('apellido') }}">
                             
            </div>

            <div class="col-12 col-md-6 col-lg-4 form-group{{ $errors->has('cedula') ? 'has-error' : '' }}">
                <label for="cedula">{{ trans('global.user.fields.cedula') }}*</label>
                <input type="text" id="cedula" name="cedula" class="validanumericos form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula') }}">
                              
            </div>

            <div class="col-12 col-md-6 form-group{{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">{{ trans('global.user.fields.telefono') }}*</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text"  id="telefono" class="validanumericos form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }} " name="telefono" value="{{ old('telefono') }}">
                  </div>
                 
            </div>

             <div class="col-12 col-md-6 form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.user.fields.email') }}*</label>
                <div class="input-group">
                    <input type="text" id="email" required="" name="email"   class="validaremail form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                     aria-describedby="basic-addon2">
                    <span class="input-group-text"  id="basic-addon2">{{_('@unexpo.com')}}</span>
                  </div>
                            
            </div>
           <div class="col-12 col-md-6 form-group{{ $errors->has('area')}}">
                <label for="area" class=" col-form-label text-md-right">{{ trans('global.user.fields.area') }}*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }} w-100" name="area_id"  tabindex="-1" aria-hidden="true">
                         @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
           <div class="col-12 col-md-6 form-group{{ $errors->has('sexo')}}">
                <label for="sexo" class=" col-form-label text-md-right">{{ trans('global.user.fields.sexo') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $sexo)
                            <option value="{{$sexo}}">{{$sexo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
                 
            
           <div class="col-12 col-md-6 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('global.user.fields.password') }}*</label>
                  <span class="btn btn-info btn-xs escribir">Escribir </span>
                  <span class="btn btn-info btn-xs restaurar">Generar</span>
                <div class="input-group">
                  <input ID="txtPassword" type="Password" name='password' Class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} ">
                  <div class="input-group-append">
                    <button id="show_password" class="btn btn-default" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                </div>
</div>
            <div class="col-12 col-md-6 form-group{{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('global.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Eliminar Todo</span></label>
                <select name="roles[]" id="roles" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}  select2" multiple="multiple">
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}">{{ $roles }}</option>
                    @endforeach
                </select>
            </div>
            <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
             <div class="col-12  d-flex justify-content-between">
                 @include('partials.widget.volver')
                <input class="btn btn-success" type="submit" value="Actualizar">
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>


    function mostrarPassword(){
        var cambio = document.getElementById("txtPassword");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 
    
$(document).ready(function () {
    //CheckBox mostrar contraseña
    

    $('#ShowPassword').click(function () {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });

    $(".escribir").on("click", function() {
        $('#txtPassword').val(''); 
        $('#txtPassword').prop('disabled', false);
        $('#show_password').prop('disabled', false);
     });

    $(".restaurar").on("click", function() {
         
        var pass = "";
        var length = 12;
        characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for (i=0; i < length; i++){
            pass += characters.charAt(Math.floor(Math.random()*characters.length));   
        }
        $('#txtPassword').val(pass);    
        $('#txtPassword').prop('disabled', true);
        $('#show_password').prop('disabled', false);
    });

});

</script>
@endsection