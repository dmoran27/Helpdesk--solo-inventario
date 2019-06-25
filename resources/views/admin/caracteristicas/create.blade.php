@extends('layouts.app')

@section('content')
 <!-- Main content -->
    <section class="content">
      
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('caracteristicas.store') }}" aria-label="{{ __('Registro') }}">
              <div class="box-body">
                <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="control-label form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="propiedad" class="col-md-4 col-form-label text-md-right">{{ __('Propiedad') }}</label>

                            <div class="col-md-6">
                                <input id="propiedad" type="text" class="control-label form-control{{ $errors->has('propiedad') ? ' is-invalid' : '' }}" name="propiedad" value="{{ old('propiedad') }}" required autofocus>

                                @if ($errors->has('propiedad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('propiedad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <div class="col-md-6">
                                <input id="user_id" type="hidden" class="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                            </div>
                        </div>                      
                       
                   
                       
                </div>
              <!-- /.box-body -->
              <div class="box-footer"> 
                <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Regitrar') }}
                                </button>
                            </div>
                
              </div>
            </div>
              <!-- /.box-footer -->
            </form>
          </div>
          @endsection 

       
    </section>


