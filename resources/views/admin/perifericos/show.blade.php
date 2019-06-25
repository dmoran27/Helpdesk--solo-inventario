@extends('layouts.admin')
@section('content')
 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route("admin.perifericos.index") }}">Perifericoss</a></li>
        <li class="breadcrumb-item active" > Perifericos:  {{ $cliente->nombre ?? '' }} </li>
          
      @endcomponent
  </div>
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">DATOS DEL PERIFICO</h5>
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
                         Observacion
                    </th>
                    <td>
                        {{ $periferico->observacion ?? '' }}
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
                           Fecha de creación:
                    </th>
                    <td>
                        {{ $periferico->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                            Fecha de actualizacion:
                    </th>
                    <td>
                        {{ $periferico->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>
<div class="card">
     <div class="card-header">
          <h5 class="text-center ">DATOS DE LAS CARACTERISTICAS DEL PERIFICO</h5>
    </div>
    <div class="card-body">
         <table class="table table-bordered table-striped table-hover datatable ">
                <thead>
                    <tr>                        
                         <th width="10">
                            #
                        </th>
                        
                        <th>
                           Nombre
                        </th>
                          <th>
                            Propiedad 
                        </th>
               
                        
                         <th>
                            Fecha de Creacion
                        </th>
                         <th>
                            Fecha de Actualizacion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periferico->caracteristicas as $id => $caracteristica )
                        <tr data-entry-id="{{ $caracteristica->id }}">
                         
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
                                {{ $caracteristica->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $caracteristica->updated_at ?? '' }}
                            </td>
                                                    

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>

<div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.perifericos.index") }}">
                    Volver
                </a>
               
            </div>

@endsection


@section('scripts')
@parent
<script type="text/javascript">
 
$( document ).ready(function() {
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        
        $('.datatable:not(.ajaxTable)').DataTable({
            columnDefs: [{
                orderable: false,
                className: '',
                targets: 0
            }],
            buttons:[]});
});
    });


</script>
@endsection