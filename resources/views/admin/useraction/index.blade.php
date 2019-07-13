@extends('layouts.admin')
@section('content')

 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
          <li class="breadcrumb-item active" aria-current="page"> Acciones de los Tecnicos </li>
      @endcomponent
  </div>

<div class="card">
    <div class="card-header">
          <h5 class="text-center ">Lista de Acciones Realizadas por los Tecnicos</h5>



    </div>
  
  
           

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                       
                         <th width="10">
                            #
                        </th>
                        <th width="10">
                            #
                        </th>
                        <th>
                            Tecnico
                        </th>
                          <th>
                            Acción
                        </th>
                       
                        <th>
                            Tabla
                        </th>
                       {{-- <th>
                            Nombre del atributo
                        </th>--}}
                        <th>
                            Id del atributo Implicado
                        </th>
                        <th>
                            Fecha
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($acciones as $key => $accion )
                        <tr data-entry-id="{{ $accion->id }}">
                          <td width="10">
                            
                        </td>
                            
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $accion->user->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $accion->action ?? '' }}
                            </td>
                             <td>
                                {{ $accion->action_model ?? '' }}
                            </td>
                          {{--   <td>
                            
                                {{$consulta[$loop->index]->nombre}}
                           
                            </td>--}}
                             <td>
                                {{ $accion->action_id ?? '' }}
                            </td>
                             <td>
                                {{ $accion->created_at ?? '' }}
                            </td>

                            

                        </tr>
                    @endforeach
                </tbody>
                 <tfoot class="tfoot2">
                    <tr>
                      <th>#</th>
                      <th>#</th>
                       <th>Tecnico</th>
                       <th>Acción</th>
                       <th>Tabla</th>
                       {{-- <th>Nombre del atributo</th>--}}
                        <th>Id del atributo</th>
                        <th>Fecha</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script type="text/javascript">
 
$( document ).ready(function() {
  //alerta de notificaciones al agregar un usuario
     


    $(function () {
      
 
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  

 //actualizar tabla al eliminar un elemento
  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons }).columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
  });
});

</script>
@endsection