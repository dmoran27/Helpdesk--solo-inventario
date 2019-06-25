
@extends('layouts.admin')
@section('login')
 <body class=" ">
    
<div class="container-fluid login-bg" >
    
    <div class="row d-flex justify-content-center  flex-wrap formulario">
         <div class="col-md-6 col-12 text-center text-sm-left">
            <img src=" {{ asset("/img/bg-2.jpg")}}" class="img-fluid" >
        </div>
        <div class="col-12 col-md-6">
            <div class="row logo d-flex justify-content-end mb-5 align-items-center">
                <div class="col-sm-4 col-12 text-center text-sm-left"  >
                    <img src=" {{ asset("/img/unexpo.png")}}" class="img-fluid">
                </div>
                <div class="col-sm-8 text-center text-sm-left col-12">
                    <p> Universidad Nacional Experimental Politécnica <br>"Antonio José de Sucre"<br> Vicerrectorado Puerto Ordaz<br>Oficina Regional  de Tecnolog&iacute;a y Servicios de Informaci&oacute;n</p>
                </div>
            </div>
            <div class="text-center row mt-5"><h4 class="text-center w-100">{{ __('Sistema ORTSI') }}</h4></div>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="row p-5">
                    @csrf

                    <div class="form-group input d-flex align-items-center col-12">
                        <div class="1">
                            <i class="fa fa-user pull-left"></i>
                        </div>
                        
                            <input id="cedula" type="text" class="w-100 form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula"  placeholder="Cedula" value="{{ old('cedula') }}" required autofocus>

                            @if ($errors->has('cedula'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                       
                    </div>

                    <div class="form-group  input d-flex align-items-center col-12">
                       
                       <div class="1">
                            <i class="fa fa-lock pull-left"></i>
                        </div>
                       
                            <input id="password" type="password" class="w-100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Clave"  name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                       
                    </div>

                    <div class="form-group col-12">
                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label pl-5" For="remember">
                                    {{ __('   Recordar Sesión') }}
                                </label>
                            </div>
                        
                    </div>

                    <div class="form-group col-12 mb-0">
                       
                            <button type="submit" class="btn">
                                {{ __('Iniciar Sesion') }}
                            </button>
                                        </div>

                    
            </form>      
            <div  class="row d-flex justify-content-end mb-5 align-items-center">
                  <div class="col-sm-4 col-12 text-right"  >
                    <img src=" {{ asset("/img/forma.png")}}" class="img-fluid">
                </div>
            </div>   
        </div>
    </div>
</div>
</body>
@endsection