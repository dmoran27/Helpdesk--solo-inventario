

@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="card-body">
        <h5 class="text-center mb-5">DATOS DEL PERIFERICO.</h5>
        <form action="{{ route('admin.perifericos.store') }}" method="POST" class="container-fluid" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="nombre2">Nombre:*</label>
                <input type="text" id="nombre2" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif                
            </div>   
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">identificador:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control" value="{{ old('identificador') }}">
                @if($errors->has('identificador'))
                    <p class="help-block">
                        {{ $errors->first('identificador') }}
                    </p>
                @endif                
            </div> 
            <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Tipo:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} " name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
            <div class="form-group {{ $errors->has('perteneciente')}} col-12 col-md-6">
                <label for="perteneciente" class=" col-form-label text-md-right">Pertenece a la UNEXPO?*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $perteneciente)
                            <option value="{{$perteneciente}}">{{$perteneciente}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado')}} col-12 col-md-6">
                <label for="estado" class=" col-form-label text-md-right">Estado del equipo:*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $estado)
                            <option value="{{$estado}}">{{$estado}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <input type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion') }}">
                @if($errors->has('observacion'))
                    <p class="help-block">
                        {{ $errors->first('observacion') }}
                    </p>
                @endif                
            </div>               
        </div>
           
          <div  id="caracteristicas" class="d-none" >
                    </div>
          
        <div class="table-responsive row">
             <h5 class="text-center my-5 col-12">CARACTERISTICAS DEL PERIFERICO:</h5>
            <table class=" table table-bordered table-striped table-hover  col-12" id='userTable'>
                <thead>
                    <tr> 
                                              
                         <th width="10">
                            #
                        </th>
                        
                        <th>
                            Nombre
                        </th>
                          <th>
                           Atributo
                        </th>
                       
                        <th>
                            Acciones
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody  value=2>                   
                        <tr data-entry-id=" ">
                            <td>
                           
                             </td>
                            
                            <td>
                                <input type='text'  class="nombre w-100" id='nombre' placeholder="Marca, Modelo, color, puerto, ...">
                            </td>
                            <td>
                                <input type='text' class="propiedad w-100" id='propiedad' placeholder="Azul, 2, ...">
                            </td>
                            <td>
                                <input type='button' id="add" value='Agregar' class="btn btn-xs w-100 btn-success">
                                
                            </td>
                            
                        </tr>
                  
                </tbody>
            </table>
        </div>         
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
       
    </div>
</div>
@endsection

@section('scripts')
@parent


    <script type='text/javascript'>
   
$(document).ready(function(){  
      // Fetch records
      //fetchRecords();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      // Add record
    $('#add').click(function(){
        var nombre = $("#nombre").val();
        var propiedad = $('#propiedad').val();
        if(nombre != '' && propiedad != '' ){             
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
                url: '{{ route("admin.caracteristicas.store") }}',
                type: 'POST',
                data: {nombre:nombre, propiedad:propiedad},
                
            }).done(function(data){
                if(data > 0){
                    swal("Felicidades!", "Elemento Agregado correctamente!", "success");
                    var id = data;
                    var findnorecord = $('#userTable tr.norecord').length;
                    if(findnorecord > 0){
                      $('#userTable tr.norecord').remove();
                    }
                      var tr_str = "<tr data-entry-id='"+id+"'><td><input type='hidden' value="+id+"  /></td><td><input type='text'  class='nombre  d-none w-100' id='nombre-"+id+"' value="+nombre+" placeholder='Marca, Modelo, color, puerto, ...''><p class=''>"+nombre+"</p></td><td><input type='text'  class='propiedad  d-none w-100' id='propiedad-"+id+"' value='"+propiedad+"' placeholder='Marca, Modelo, color, puerto, ...'><p class=''>"+propiedad+"</p></td><td><!--input type='button' value='Editar' class='update btn btn-xs w-100 btn-info' data-id='"+id+"' --><input type='button' class='btn btn-xs w-100 btn-danger delete' value='Eliminar  ' data-id='"+id+"' ></td>"+
                    "</tr>";
                    $("#userTable tbody").append(tr_str);
                    var option="<input name='caracteristicas[]' value="+id+" id='input-"+id+"' />";
                    $("#caracteristicas").append(option);    
                    
                  }else if(data == 0){
                    swal("UPS!", "Error en el servidor!", "danger");
                    alert('Error.');
                  }else{
                    alert(data);
                  }
                  // Empty the input fields
                  $('#nombre').val('');
                  $('#propiedad').val('');
             
             }).fail(function(x,xs,xt){
                  //nos dara el error si es que hay alguno
                 // window.open(JSON.stringify(x));
                alert('error: ' + x+"\n error string: "+ xs + "\n error throwed: " + xt);
            });
        }else{
            alert(' falta datos');
        }
      

    });

    /* Update record
    $(document).on("click", ".update" , function() {
      var edit_id = $(this).data('id');
      var nombre = $('#nombre_'+edit_id).val();
      var propiedad = $('#propiedad_'+edit_id).val();

      if(nombre != '' && propiedad != ''){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          url: '{{URL::to("/admin/caracteristicas/")}}/'+ edit_id,
          type: 'put',
          data: {_token: CSRF_TOKEN,nombre: nombre,propiedad: propiedad},
          }).done(function(response){
            alert(response);
          }).fail(function(response){
            alert("fatal");
          })
      }else{
        alert('Fill all fields');
      }
    });/**/

    // Delete record
 $(document).on("click", ".delete" , function() {
      var delete_id = $(this).data('id');
      var el = this;
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
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: '{{URL::to("/admin/caracteristicas/")}}/'+ delete_id,
                type: 'delete'
            })
                .done( function(response){
                    swal("Felicidades!", "Elemento Eliminado correctamente!", "success");
                    $(el).closest( "tr" ).remove();
                    $('#caracteristicas #input-'+delete_id).remove();
                
                 });
        } 
    });
});


    // Fetch records
    function fetchRecords(){
     $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
        $.ajax({
        url: '{{ route("admin.caracteristicas.index") }}',
        method: 'GET',
        dataType: 'json',
        success: function(response){
         

          var len = 0;
          $('#userTable tbody tr:not(:first)').empty(); // Empty <tbody>
          if(response!= null){
            len = response.length;
          }
          if(len > 0){
            for(var i=0; i<len; i++){

              var id = response[i].id;
              var nombre = response[i].nombre;
              var propiedad = response[i].propiedad;
              
              var tr_str = "<tr>"+"<td ><input type='checkbox' name='caracteristica' id='opt-in'></td>" +"<td align='center'><input type='text' value='" + nombre + "' class='nombre_"+id+" w-100' id='nombre_"+id+"' ></td>" +
                "<td align='center'><input type='text' value='" + propiedad + "' class='propiedad_"+id+" w-100' id='propiedad_"+id+"'></td>" +
                "<td align='center'><input type='button' value='Editar' class='update btn btn-xs w-100 btn-info' data-id='"+id+"' ><input type='button' class='btn btn-xs w-100 btn-danger delete' value='Eliminar  ' data-id='"+id+"' ></td>"+
                "</tr>";

              $("#userTable tbody").append(tr_str);

            }
          }else{
            var tr_str = "<tr class='norecord'>" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";

            $("#userTable tbody").append(tr_str);
          }

        }
      });
    }
   
 });

</script>

@endsection