@extends('layouts.admin')
@section('content')
 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route("admin.clientes.index") }}">Usuarios</a></li>
        <li class="breadcrumb-item active" > Usuario:  {{ $cliente->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">DATOS DEL USUARIO</h5>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         Nombre:
                    </th>
                    <td>
                        {{ $cliente->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          Apellido:
                    </th>
                    <td>
                        {{ $cliente->apellido ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          Cedula:
                    </th>
                    <td>
                        {{ $cliente->cedula ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          Telefono:
                    </th>
                    <td>
                        {{ $cliente->telefono ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          Sexo:
                    </th>
                    <td>
                        {{ $cliente->sexo ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Email:
                    </th>
                    <td>
                         {{ $cliente->email ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                          Area:
                    </th>
                    <td>
                        {{ $cliente->tipo ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                         Dependencia:
                    </th>
                    <td>
                       {{ $cliente->dependencia->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Fecha de creación:
                    </th>
                    <td>
                        {{ $cliente->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          Fecha de actualizacion:
                    </th>
                    <td>
                        {{ $cliente->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>


 <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.clientes.index") }}">
                    Volver
                </a>
               
            </div>
@endsection