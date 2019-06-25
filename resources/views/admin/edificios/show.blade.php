@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.edificios.index") }}'>Edificios</a></li>
        <li class="breadcrumb-item active" > Edificio:  {{ $edificio->nombre ?? '' }}</li>
          
      @endcomponent
  </div>
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">DATOS DEL EDIFICIO.</h5>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         Nombre:  
                    </th>
                    <td>
                        {{ $edificio->nombre ?? '' }}
                    </td>
                </tr>
                
                <tr>
                    <th>
                          Fecha de creación:
                    </th>
                    <td>
                        {{ $edificio->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          Fecha de actualización:
                    </th>
                    <td>
                        {{ $edificio->updated_at ?? '' }}
                    </td>
                </tr>
               
                
            </tbody>
        </table>
    </div>
</div>
 <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.edificios.index") }}">
                    Volver
                </a>
               
            </div>
@endsection