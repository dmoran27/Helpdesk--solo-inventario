@extends('layouts.admin')
@section('content')

 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
          <li class="breadcrumb-item active" aria-current="page"> Perifericos </li>
      @endcomponent
  </div>

@can('periferico_create')

        <div class="">
            <a class="btn btn-success" href="{{ route("admin.perifericos.create") }}">
                Agregar Nuevo Periferico
            </a>
        </div>
   
@endcan
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">Lista de Perifericos</h5>



    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
*                        </th>
                         <th width="10">
                            #
                        </th>
                        <th>
                            Identificador
                        </th>
                        <th>
                            Nombre
                        </th>
                          <th>
                            Estado 
                        </th>
               
                        <th>
                            Pertenence?
                        </th>
                         <th>
                            Observación
                        </th>
                         <th>
                            Tipo de Periferico
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perifericos as  $periferico )
                        <tr data-entry-id="{{ $periferico->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $periferico->identificador ?? '' }}
                            </td>
                            <td>
                                {{ $periferico->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $periferico->estado ?? '' }}
                            </td>
                             
                             <td>
                                {{ $periferico->perteneciente ?? '' }}
                            </td>
							<td>
                                {{ $periferico->observacion ?? '' }}
                            </td>
                            <td>
                                {{ $periferico->tipo->nombre ?? '' }}
                            </td>
							                            
                            <td>
                                 @can('periferico_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.perifericos.show', $periferico->id) }}">
                                        Ver
                                    </a>
                                @endcan
                                @can('periferico_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.perifericos.edit', $periferico) }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('periferico_delete')
                                      <form action="{{ route('admin.perifericos.destroy', $periferico->id) }}" method="POST" class="w-100 d-inline-block formularioEliminar" id="formularioEliminar{{$periferico->id}}" 
                                      ">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button id="eliminar" class="btn w-100 btn-xs btn-danger eliminar" value="{{$periferico->id}}">Eliminar</button>
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                         <th width="10">
                            
                        </th>
                         <th width="10">
                           
                        </th>
                        <th>Identificador</th>
                        <th>Nombre</th>
                          <th>Estado </th>
               
                        <th>Pertenence?</th>
                         <th>Observación</th>
                         <th>Tipo </th>
                        <th>Acciones</th>
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
 if('{{$notificacion}}' != ''){
        swal({
        position: 'top-end',
        type: 'success',
        title: '{{$notificacion}}',
        icon: "success",
        successMode: true,
        showConfirmButton: false,
        timer: 2500,
      })
    }

  $(function () {
  //--------------------------------Boton para eliminar seleccion
  
  let deleteButton = {
    text:'<i class="fa fa-trash"></i><span>Eliminar Seleccion</span>',
    url: "{{ route('admin.perifericos.massDestroy') }}",
    className: 'btn-danger buttons-delete',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

       if (ids.length === 0) {
         swal("OJO!", "Elemento no existe!", "warning");
        return
      }

       swal({
      title: "Esta Seguro de Eliminar este elemento?",
      text: "Una vez eliminado no podra recuperarlo!",
      icon: "warning",
      dangerMode: true,
      buttons: {
        cancel: {
            text: "Cancelar",
            visible:true
        },
        confirm: {
            text: "Si"
        }
        }
      }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
              headers: {'x-csrf-token': _token},
              method: 'POST',
              url: config.url,
              data: { ids: ids, _method: 'DELETE' }
            }).done(function () { 
              swal({
                position: 'top-end',
                type: 'success',
                title:  "Elemento Eliminado correctamente!",
                icon: "success",
                successMode: true,
                showConfirmButton: false,
                timer: 2500,
              });



            location.assign("{{ route('admin.perifericos.index') }}").deley(3000) })
        }
    });
  }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  @can('periferico_delete')
    dtButtons.push(deleteButton)
  @endcan

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
  } );
});
</script>
@endsection