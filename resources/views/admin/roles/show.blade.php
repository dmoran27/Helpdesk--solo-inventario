@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href='{{ route("admin.roles.index") }}'>Roles</a></li>
        <li class="breadcrumb-item active" > Rol:  {{ $role->title ?? '' }}</li>
          
      @endcomponent
  </div>
<div class="card">
     <div class="card-header">
          <h5 class="text-center ">DATOS DEL ROL.</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                       Nombre
                    </th>
                    <td>
                        {{ $role->title }}
                    </td>
                </tr>
                <tr>
                    <th>
Permisos                    </th>
                    <td>
                      <ul>  @foreach($role->permissions as $id => $permissions)
                            <li>{{ $permissions->nombre }}</li>
                        @endforeach
                    </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
 <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.roles.index") }}">
                    Volver
                </a>
               
            </div>
@endsection