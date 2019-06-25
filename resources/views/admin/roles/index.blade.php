@extends('layouts.admin')
@section('content')
@can('role_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.roles.create") }}">
                Agregar Nuevo Rol
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">Lista de Roles</h5>
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
                           Nombre
                        </th>
                        <th>
                            Permiso
                        </th>
                        <th>
                           Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                        <tr data-entry-id="{{ $role->id }}">
                            <td>
                                
                            </td>
                            <td>
                                {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $role->title ?? '' }}
                            </td>
                            <td>
                                @foreach($role->permissions as $key => $item)
                                    <span class="badge badge-info">{{ $item->nombre }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('role_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.roles.show', $role->id) }}">
                                       Ver
                                    </a>
                                @endcan
                                @can('role_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.roles.edit', $role->id) }}">
                                       Editar
                                    </a>
                                @endcan
                                @can('role_delete')
                                   <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="w-100 d-inline-block formularioEliminar" id="formularioEliminar{{$role->id}}" 
                                      ">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button id="eliminar" class="btn w-100 btn-xs btn-danger eliminar" value="{{$role->id}}">Eliminar</button>
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
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
      
  let deleteButton = {
    text:'<i class="fa fa-trash"></i><span>Eliminar Seleccion</span>',
    url: "{{ route('admin.roles.massDestroy') }}",
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



            location.assign("{{ route('admin.roles.index') }}").deley(3000) })
        }
    });
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  @can('role_delete')
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
  });
});
</script>
@endsection