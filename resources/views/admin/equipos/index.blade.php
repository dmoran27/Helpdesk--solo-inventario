@extends('layouts.admin')
@section('content')

 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
          <li class="breadcrumb-item active" aria-current="page"> Equipos </li>
      @endcomponent
  </div>

@can('equipo_create')

        <div class="">
            <a class="btn btn-success" href="{{ route("admin.equipos.create") }}">
                Agregar Nuevo Equipo
            </a>
        </div>
   
@endcan
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">Lista de Equipos</h5>



    </div>
  
  
           

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            *
                        </th>
                         <th width="10">
                            #
                        </th>
                        <th>
                            {{ trans('global.equipo.fields.identificador') }} 
                        </th>
                        <th>
                            {{ trans('global.equipo.fields.nombre') }} 
                        </th>
                        <th>
                            {{ trans('global.equipo.fields.modelo') }} 
                        </th>

                        <th>
                            {{ trans('global.equipo.fields.marca') }} 
                        </th>
                        <th>
                            {{ trans('global.equipo.fields.serial') }} 
                        </th>

                          <th>
                            {{ trans('global.equipo.fields.estado') }} 
                        </th>
 <th>
                            {{ trans('global.equipo.fields.tipo') }} 
                        </th>               
                        <th>
                            Perteneciente
                        </th>
                       
                        
                        
                        <th>
                            {{ trans('global.equipo.fields.acciones') }} 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipos as  $equipo )
                        <tr data-entry-id="{{ $equipo->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $equipo->identificador ?? '' }}
                            </td>
                            <td>
                                {{ $equipo->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $equipo->modelo ?? '' }}
                            </td>
                            <td>
                                {{ $equipo->marca ?? '' }}
                            </td>
                            <td>
                                {{ $equipo->serial ?? '' }}
                            </td>
                            <td>
                                {{ $equipo->estado_equipo ?? '' }}
                            </td>
                            <td>
                                {{ $equipo->tipo->nombre ?? '' }}
                            </td>
                             
                             <td>
                                {{ $equipo->perteneciente ?? '' }}
                            </td>                                                        
                            <td>
                                 @can('equipo_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.equipos.show', $equipo->id) }}">
                                        Ver
                                    </a>
                                @endcan
                                @can('equipo_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.equipos.edit', $equipo) }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('equipo_delete')
                                    <form action="{{ route('admin.equipos.destroy', $equipo->id) }}" method="POST" class="w-100 d-inline-block formularioEliminar" id="formularioEliminar{{$equipo->id}}" 
                                      ">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button id="eliminar" class="btn w-100 btn-xs btn-danger eliminar" value="{{$equipo->id}}">Eliminar</button>
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr><th>  </th><th> </th>
                         <th> {{ trans('global.equipo.fields.identificador') }} </th>
                        <th> {{ trans('global.equipo.fields.nombre') }} </th>
                        <th> {{ trans('global.equipo.fields.modelo') }} </th>

                        <th> {{ trans('global.equipo.fields.marca') }} </th>
                        <th> {{ trans('global.equipo.fields.serial') }} </th>

                          <th> {{ trans('global.equipo.fields.estado') }} </th>
 <th> {{ trans('global.equipo.fields.tipo') }} </th>               
                        <th> Perteneciente</th>
                       
                        
                        
                        <th> {{ trans('global.equipo.fields.acciones') }} </th> 
                    </tr>
                </tfoot>  
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
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
    url: "{{ route('admin.equipos.massDestroy') }}",
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



            location.assign("{{ route('admin.equipos.index') }}").deley(3000) })
        }
    });
  }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  @can('equipo_delete')
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