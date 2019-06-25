@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.equipo.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                          {{ trans('global.equipo.fields.identificador') }} 
                    </th>
                    <td>
                        {{ $equipo->identificador ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         {{ trans('global.equipo.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $equipo->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.equipo.fields.modelo') }} 
                    </th>
                    <td>
                        {{ $equipo->modelo ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.equipo.fields.serial') }} 
                    </th>
                    <td>
                        {{ $equipo->serial ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.equipo.fields.estado_equipo') }} 
                    </th>
                    <td>
                        {{ $equipo->estado_equipo ?? '' }}
                    </td>
                </tr>
               <tr>
                <tr>
                    <th>
                          {{ trans('global.equipo.fields.perteneciente') }} 
                    </th>
                    <td>
                        {{ $equipo->perteneciente ?? '' }}
                    </td>
                </tr>
                    <th>
                         {{ trans('global.equipo.fields.tipo') }}
                    </th>
                    <td>
                       {{ $equipo->tipo->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.equipo.fields.creacion') }} 
                    </th>
                    <td>
                        {{ $equipo->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.equipo.fields.actualizacion') }} 
                    </th>
                    <td>
                        {{ $equipo->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
<div class="card-header">
        {{ trans('global.caracteristicas.title') }}
    </div>
    <div>
         <table class="  table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            
                        </th>
                         <th width="10">
                            #
                        </th>
                        
                        <th>
                            {{ trans('global.caracteristicas.fields.nombre') }} 
                        </th>
                          <th>
                            {{ trans('global.caracteristicas.fields.propiedad') }} 
                        </th>
               
                        <th>
                            {{ trans('global.caracteristicas.fields.observacion') }}
                        </th>
                         <th>
                            {{ trans('global.caracteristicas.fields.creacion') }}
                        </th>
                         <th>
                            {{ trans('global.caracteristicas.fields.actualizacion') }}
                        </th>
                        
                        
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipo->caracteristicas as $id => $caracteristica )
                        <tr data-entry-id="{{ $caracteristica->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            
                            <td>
                                {{ $caracteristica->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $caracteristica->propiedad ?? '' }}
                            </td>
                             
                             <td>
                                {{ $caracteristica->observacion ?? '' }}
                            </td>
                            <td>
                                {{ $caracteristica->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $caracteristica->updated_at ?? '' }}
                            </td>
                                                        
                            <!--td>
                                 @can('user_show')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.equipos.show', $equipo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.equipos.edit', $equipo) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('admin.equipos.destroy', $equipo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td-->

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="card-header">
         {{ trans('global.equipo.title') }}
    </div>
     <div>
         <table class="  table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            
                        </th>
                         <th width="10">
                            #
                        </th>
                        
                        <th>
                            {{ trans('global.periferico.fields.nombre') }} 
                        </th>
                          <th>
                            {{ trans('global.periferico.fields.propiedad') }} 
                        </th>
               
                        <th>
                            {{ trans('global.periferico.fields.observacion') }}
                        </th>
                         <th>
                            {{ trans('global.periferico.fields.creacion') }}
                        </th>
                         <th>
                            {{ trans('global.periferico.fields.actualizacion') }}
                        </th>
                        
                        
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipo->perifericos as $id => $periferico )
                        <tr data-entry-id="{{ $periferico->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            
                            <td>
                                {{ $periferico->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $periferico->propiedad ?? '' }}
                            </td>
                             
                             <td>
                                {{ $periferico->observacion ?? '' }}
                            </td>
                            <td>
                                {{ $periferico->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $periferico->updated_at ?? '' }}
                            </td>
                                                        
                            <!--td>
                                 @can('user_show')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.equipos.show', $equipo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.equipos.edit', $equipo) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('admin.equipos.destroy', $equipo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td-->

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>


@endsection