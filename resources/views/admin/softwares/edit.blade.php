@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.software.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.softwares.update", [$software->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.software.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($software) ? $software->nombre : '') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('global.software.fields.descripcion') }}*</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($software) ? $software->descripcion : '') }}">
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.software.fields.tipo') }}*</label>

                <div class="">
                   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($tipos as $tipo)
                          <option value="{{ $tipo->id}}" @if($tipo->id === $software->tipo_id) selected @else '' @endif >{{$tipo->nombre}}</option>
                      @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <input id="user_id" type="hidden" class="hidden" name="user_id">
                </div>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection