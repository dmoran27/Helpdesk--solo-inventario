@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route("admin.users.index") }}">Tecnicos</a></li>
        <li class="breadcrumb-item active" > Tecnico:  {{ $user->nombre ?? '' }} </li>
          
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
                         {{ trans('global.user.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $user->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.apellido') }} 
                    </th>
                    <td>
                        {{ $user->apellido ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.cedula') }} 
                    </th>
                    <td>
                        {{ $user->cedula ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.telefono') }} 
                    </th>
                    <td>
                        {{ $user->telefono ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.sexo') }} 
                    </th>
                    <td>
                        {{ $user->sexo ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         {{ trans('global.user.fields.email') }} 
                    </th>
                    <td>
                         {{ $user->email ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                          {{ trans('global.user.fields.area') }} 
                    </th>
                    <td>
                        {{ $user->areas->nombre ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('global.user.fields.roles') }} 
                    </th>
                    <td>
                        @foreach($user->roles as $id => $roles)
                            <span class="badge badge-info">{{ $roles->title }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                         Fecha de creación:
                    </th>
                    <td>
                        {{ $user->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Fecha deactualización:
                    </th>
                    <td>
                        {{ $user->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>
 <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.users.index") }}">
                    Volver
                </a>
               
            </div>
@endsection