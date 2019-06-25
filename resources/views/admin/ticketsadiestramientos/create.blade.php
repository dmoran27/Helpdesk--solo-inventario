

@extends('layouts.admin')
@section('content')

@include('admin.tickets.create')

 <div class="row">
      <div class="col-12">
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Asunto:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control" value="{{ old('identificador') }}">
                              
            </div> 
                  
             
             <div class="form-group {{ $errors->has('perifericos') ? 'has-error' : '' }} col-12">
                <label for="perifericos" class="w-100">Tecnicos implicados:
                    <span class="btn btn-info btn-xs select-all">Seleccionar todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span></label>
                <select name="perifericos[]" id="perifericos" class="form-control w-100 select2" multiple="multiple">
                   
                </select>
               
            </div>

    </div>
</div>





@endsection