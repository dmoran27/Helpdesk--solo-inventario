

@extends('layouts.admin')
@section('content')

<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.equipos.index") }}'>Equipos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Nuevo Equipo </li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">AGREGAR UN EQUIPO</h5>
    </div>
    <div class="card-body">
       
        <form action="{{ route('admin.equipos.store') }}" method="POST" class="container-fluid" enctype="multipart/form-data">
            @csrf
        <div class="row">
             
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Identificador:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('identificador') }}">
                               
            </div> 
             <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="nombre2">Nombre:*</label>
                <input type="text" id="nombre2" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}">
                              
            </div> 
             <div class="form-group {{ $errors->has('marca') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="marca2">Marca:</label>
                <input type="text" id="marca2" name="marca" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('marca') }}">
                               
            </div> 
             <div class="form-group {{ $errors->has('modelo') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="modelo2">Modelo:</label>
                <input type="text" id="modelo2" name="modelo" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('modelo') }}">
                               
            </div> 
             <div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="serial2">Serial:</label>
                <input type="text" id="serial2" name="serial" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('serial') }}">
                                
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
             <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Dependencia:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} " name="dependencia_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($dependencias as $dependencia)
                            <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
            
            <div class="form-group col-md-6 col-12 {{ $errors->has('perifericos') ? 'has-error' : '' }}">
                <label for="perifericos">Perifericos
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span>
                    @can('periferico_create')
                    <a href="{{ route("admin.perifericos.create") }}"><span class="btn btn-info btn-xs">Agregar Nuevo</span></a>
                    @endcan
                  </label>
                <select id="perifericos" name="perifericos[]" class="form-control select2" multiple="multiple">
                    @foreach($perifericos as $id => $perifericos)
                        <option value="{{ $perifericos->id }}" >
                            {{ $perifericos->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
              <div class="form-group col-md-6 col-12 {{ $errors->has('softwares') ? 'has-error' : '' }}">
                <label for="softwares">Softwares
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span>
                    @can('software_create')
                    <a href="{{ route("admin.softwares.create") }}"><span class="btn btn-info btn-xs">Agregar Nuevo</span></a>
                    @endcan
                  </label>
                <select id="softwares" name="softwares[]" class="form-control select2" multiple="multiple">
                    @foreach($softwares as $id => $softwares)
                        <option value="{{ $softwares->id }}" >
                            {{ $softwares->nombre }}
                        </option>
                    @endforeach
                </select>
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
                <textarea type="text" id="observacion" name="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" value="{{ old('observacion') }}">{{ old('observacion') }}</textarea> 
                             
            </div>               
        </div>
           
                
        <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.equipos.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
       
    </div>
</div>
@endsection
