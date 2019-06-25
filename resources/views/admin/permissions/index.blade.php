@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
          <li class="breadcrumb-item active" aria-current="page"> Permisos </li>
      @endcomponent
</div>

<div class="card">
   <div class="card-header">
          <h5 class="text-center ">PERMISOS</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                    
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.permission.fields.title') }}
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            
                            <td>
                              {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $permission->nombre ?? '' }}
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
            buttons: [     
      {
        extend: 'print',
        className: '',
        text:'<i class="fa fa-print"></i><span>Imprimir</span>',
        exportOptions: {
          columns: ':visible'
        }
      }
    ]     
        });
});
    });


</script>
@endsection