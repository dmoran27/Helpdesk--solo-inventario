@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.areas.index") }}'>Areas</a></li>
        <li class="breadcrumb-item active" > Area:  {{ $area->nombre ?? '' }}</li>
          
      @endcomponent
  </div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">DATOS DEL AREA.</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <td>
                        {{ $area->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Descripcion 
                    </th>
                    <td>
                        {{ $area->descripcion ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.cedula') }} 
                    </th>
                    <td>
                        {{ $area->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.telefono') }} 
                    </th>
                    <td>
                        {{ $area->updated_at ?? '' }}
                    </td>
                </tr>
          
                
            </tbody>
        </table>
    </div>
</div>
 <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.areas.index") }}">
                    Volver
                </a>
                
                 
            </div>
@endsection