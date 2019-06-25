@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route("admin.softwares.index") }}">Softwares</a></li>
        <li class="breadcrumb-item active" > Software:  {{ $Software->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">DATOS DEL SOFTWARE</h5>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         {{ trans('global.software.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $software->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.software.fields.descripcion') }} 
                    </th>
                    <td>
                        {{ $software->descripcion ?? '' }}
                    </td>
                </tr>
               <tr>
                    <th>
                         {{ trans('global.software.fields.tipo') }}
                    </th>
                    <td>
                       {{ $software->tipo->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                     <th>
                           Fecha de creación:
                    </th>
                    <td>
                        {{ $software->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                            Fecha de actualizacion:
                    </th>
                    <td>
                        {{ $software->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>
<div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.softwares.index") }}">
                    Volver
                </a>
               
            </div>

@endsection