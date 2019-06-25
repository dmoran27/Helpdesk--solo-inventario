@extends('layouts.admin')
@section('content')

@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.perifericos.create") }}">
                {{ trans('global.add') }} {{ trans('global.periferico.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.periferico.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            
                        </th>
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
                                {{ $periferico->tipo_id ?? '' }}
                            </td>
							                            
                            <td>
                                 @can('user_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.perifericos.show', $periferico->id) }}">
                                        Ver
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.perifericos.edit', $periferico) }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('admin.perifericos.destroy', $periferico->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" >
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn p-0 btn-xs btn-danger w-100" value="Eliminar">Eliminar</button>
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
 $(function () {

    
 });



    $(function () {
  let deleteButton = {
    text: 'Eliminar Seleccion',
    url: "{{ route('admin.perifericos.massDestroy') }}",
    className: 'btn-danger',
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
            }).done(function () {  swal("Felicidades!", "Elemento Eliminado correctamente!", "success"); location.reload() })
        }
    });
  }
}
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
});

</script>
@endsection