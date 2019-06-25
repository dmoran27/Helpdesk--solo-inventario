@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.periferico.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         {{ trans('global.periferico.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $periferico->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.periferico.fields.descripcion') }} 
                    </th>
                    <td>
                        {{ $periferico->descripcion ?? '' }}
                    </td>
                </tr>
               <tr>
                    <th>
                         {{ trans('global.periferico.fields.tipo') }}
                    </th>
                    <td>
                       {{ $periferico->tipo->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.periferico.fields.creacion') }} 
                    </th>
                    <td>
                        {{ $periferico->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.periferico.fields.actualizacion') }} 
                    </th>
                    <td>
                        {{ $periferico->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>

    <div>
    	 <table class="table table-bordered table-striped">
            <tbody>
            	@foreach($periferico->caracteristicas as $id => $caracteristica)
                
                 @endforeach
            </tbody>
        </table>

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
                    @foreach($periferico->caracteristicas as $id => $caracteristica )
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
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.perifericos.show', $periferico->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.perifericos.edit', $periferico) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('admin.perifericos.destroy', $periferico->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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