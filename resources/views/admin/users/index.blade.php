@extends('layouts.admin')
@section('content')

 <div class="breadcrumb">
      @component('partials.widget.breadcrumb')
          <li class="breadcrumb-item active" aria-current="page"> Tecnicos </li>
      @endcomponent
  </div>

@can('user_create')

        <div class="">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                Agregar Nuevo Tecnico
            </a>
        </div>
   
@endcan
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">Lista de Tecnicos</h5>



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
                            {{ trans('global.user.fields.nombre') }} 
                        </th>
                          <th>
                            {{ trans('global.user.fields.apellido') }} 
                        </th>
                       
                        <th>
                            {{ trans('global.user.fields.cedula') }}
                        </th>
                        <th>
                            {{ trans('global.user.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('global.user.fields.sexo') }}
                        </th>
                        <th>
                            {{ trans('global.user.fields.area') }}
                        </th>
                        <th>
                            {{ trans('global.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('global.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('global.user.fields.acciones') }} 
                          
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user )
                        <tr data-entry-id="{{ $user->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $user->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $user->apellido ?? '' }}
                            </td>
                             <td>
                                {{ $user->cedula ?? '' }}
                            </td>
                             <td>
                                {{ $user->telefono ?? '' }}
                            </td>
                             <td>
                                {{ $user->sexo ?? '' }}
                            </td>
                             <td>
                                {{ $user->areas->nombre ?? '' }}
                            </td>
                             <td>
                                {{ $user->email ?? '' }}
                            </td>
                            
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('user_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.users.show', $user->id) }}">
                                        Ver
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.users.edit', $user) }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="w-100 d-inline-block formularioEliminar" id="formularioEliminar{{$user->id}}" 
                                      ">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button id="eliminar" class="btn w-100 btn-xs btn-danger eliminar" value="{{$user->id}}">Eliminar</button>
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
                        <th>{{ trans('global.user.fields.nombre') }} </th>
                          <th>{{ trans('global.user.fields.apellido') }} </th>
                       
                        <th>{{ trans('global.user.fields.cedula') }}</th>
                        <th>{{ trans('global.user.fields.telefono') }}</th>
                        <th>{{ trans('global.user.fields.sexo') }}</th>
                        <th>{{ trans('global.user.fields.area') }}</th>
                        <th>{{ trans('global.user.fields.email') }}</th>
                        <th>{{ trans('global.user.fields.roles') }}</th>
                        <th>{{ trans('global.user.fields.acciones') }}</th>
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
 $(function () {

    
 });



    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
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
    url: "{{ route('admin.users.massDestroy') }}",
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



            location.assign("{{ route('admin.users.index') }}").deley(3000) })
        }
    });
  }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  @can('user_delete')
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
});
</script>
@endsection