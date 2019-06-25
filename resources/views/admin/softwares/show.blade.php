@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.software.title') }}
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
                          {{ trans('global.software.fields.creacion') }} 
                    </th>
                    <td>
                        {{ $software->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.software.fields.actualizacion') }} 
                    </th>
                    <td>
                        {{ $software->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>

@endsection