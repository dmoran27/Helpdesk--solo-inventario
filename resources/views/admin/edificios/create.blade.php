@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.edificios.index") }}'>Edificios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Nueva Edificio</li>
          
      @endcomponent
  </div>
<div class="card">
     <div class="card-header">
          <h5 class="text-center ">CREAR NUEVO EDIFICIO.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.edificios.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="textarea" id="nombre" name="nombre" class="validarletras   form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}">              
                     
            </div>
                
             @if($errors->all())
            <div class="bg-danger p-3 mb-2 col-12">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                 
                    
            @endif
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.edificios.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </form>
    </div>
</div>
@endsection