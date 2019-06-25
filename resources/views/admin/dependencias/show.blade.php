@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.dependencias.index") }}'>Dependencias</a></li>
        <li class="breadcrumb-item active" > Dependencia:  {{ $dependencia->nombre ?? '' }}</li>
          
      @endcomponent
  </div>
<div class="card">
     <div class="card-header">
          <h5 class="text-center ">DATOS DE DEPENDENCIA.</h5>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nombre:
                    </th>
                    <td>
                        {{ $dependencia->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Piso:
                    </th>
                    <td>
                        {{ $dependencia->piso ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Edificio:
                    </th>
                    <td>
                        {{ $dependencia->edificio->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Fecha de creacion:
                    </th>
                    <td>
                        {{ $dependencia->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Fecha de actualizacion:
                    </th>
                    <td>
                        {{ $dependencia->updated_at ?? '' }}
                    </td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
</div>
 <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.dependencias.index") }}">
                    Volver
                </a>
            </div>

@endsection