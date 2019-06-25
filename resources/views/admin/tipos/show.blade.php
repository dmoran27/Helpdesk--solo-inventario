@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.tipos.index") }}'>Tipos</a></li>
        <li class="breadcrumb-item active" > Tipo:  {{ $tipo->nombre ?? '' }}</li>
          
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
                        Nombre
                    </th>
                    <td>
                        {{ $tipo->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Descripcion 
                    </th>
                    <td>
                        {{ $tipo->descripcion ?? '' }}
                    </td>
                </tr>
               <tr>
                    <th>
                        Tipo
                    </th>
                    <td>
                       {{ $tipo->tipo ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Fecha de creacion
                    </th>
                    <td>
                        {{ $tipo->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Fecha de actualizacion
                    </th>
                    <td>
                        {{ $tipo->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>
 <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.tipos.index") }}">
                    Volver
                </a>
            </div>
@endsection