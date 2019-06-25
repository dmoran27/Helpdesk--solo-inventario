

@extends('layouts.admin')
@section('content')

@include('admin.tickets.create')

 <div class="row">
      <div class="col-12">
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Asunto:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control" value="{{ old('identificador') }}">
                              
            </div> 
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Objetivos:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control" value="{{ old('identificador') }}">
                              
            </div> 

             <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Acuerdos:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control" value="{{ old('identificador') }}">
                              
            </div> 

    </div>
</div>





@endsection