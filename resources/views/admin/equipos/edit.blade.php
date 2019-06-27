

@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="card-body">
         <h5 class="text-center mb-5">DATOS DEL EQUIPO.</h5>
        <form action="{{ route('admin.equipos.update', [$equipo]) }}" method="POST" class="container-fluid" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="row">
             
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Identificador:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control{{ $errors->has('identificador') ? ' is-invalid' : '' }}" value="{{ old('identificador', isset($equipo) ? $equipo->identificador : '') }}">
                               
            </div> 
             <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="nombre2">Nombre:*</label>
                <input type="text" id="nombre2" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre', isset($equipo) ? $equipo->nombre : '') }}">
                              
            </div> 
             <div class="form-group {{ $errors->has('marca') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="marca2">Marca:</label>
                <input type="text" id="marca2" name="marca" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" value="{{ old('marca', isset($equipo) ? $equipo->marca : '') }}">
                               
            </div> 
             <div class="form-group {{ $errors->has('modelo') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="modelo2">Modelo:</label>
                <input type="text" id="modelo2" name="modelo" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" value="{{ old('modelo', isset($equipo) ? $equipo->modelo : '') }}">
                               
            </div> 
             <div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="serial2">Serial:</label>
                <input type="text" id="serial2" name="serial" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" value="{{ old('serial', isset($equipo) ? $equipo->serial : '') }}">
                                
            </div> 
            <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Tipo:*</label>
                <div class="">   
                 
                   <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} " name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}} " @if($tipo=== $equipo->tipo_id) selected @else '' @endif">{{$tipo->nombre}}></option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
             <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Dependencia:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} " name="dependencia_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($dependencias as $dependencia)
                            <option value="{{$dependencia->id}} "@if($dependencia->id === $equipo->dependencia_id) selected @else '' @endif>{{$dependencia->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
            
            <div class="form-group col-md-6 col-12 {{ $errors->has('perifericos') ? 'has-error' : '' }}">
                <label for="perifericos">Perifericos
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span>
                    @can('periferico_create')
                    <a href="{{ route("admin.perifericos.create") }}"><span class="btn btn-info btn-xs">Agregar Nuevo</span></a>
                    @endcan
                  </label>
                <select id="perifericos" name="perifericos[]" class="form-control select2" multiple="multiple">
                    @foreach($perifericos as $id => $periferico)
                        <option value="{{$periferico->id}}"  {{ (in_array($id, old('periferico', [])) || isset($equipo) && $equipo->perifericos->contains($periferico->id )) ? 'selected' : '' }}>
                            {{ $periferico->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
              <div class="form-group col-md-6 col-12 {{ $errors->has('softwares') ? 'has-error' : '' }}">
                <label for="softwares">Softwares
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span>
                    @can('software_create')
                    <a href="{{ route("admin.softwares.create") }}"><span class="btn btn-info btn-xs">Agregar Nuevo</span></a>
                    @endcan
                  </label>
                <select id="softwares" name="softwares[]" class="form-control select2" multiple="multiple">
                    @foreach($softwares as $id => $softwares)
                        <option value="{{ $softwares->id }}"  {{ (in_array($id, old('software', [])) || isset($equipo) && $equipo->softwares->contains($softwares->id )) ? 'selected' : '' }} >
                            {{ $softwares->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group {{ $errors->has('perteneciente')}} col-12 col-md-6">
                <label for="perteneciente" class=" col-form-label text-md-right">Pertenece a la UNEXPO?*</label>
                <div class="">   
                      <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $perteneciente)
                            <option value="{{$perteneciente}}" @if($perteneciente === $equipo->perteneciente) selected @else '' @endif>{{$perteneciente}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado')}} col-12 col-md-6">
                <label for="estado" class=" col-form-label text-md-right">Estado del equipo:*</label>
                <div class="">   
                     <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $estado)
                            <option value="{{$estado}}" @if($estado === $equipo->estado_equipo) selected @else '' @endif >{{$estado}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <textarea type="text" id="observacion" name="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" value="{{ old('observacion', isset($equipo) ? $equipo->observacion : '') }}">{{ old('observacion', isset($equipo) ? $equipo->observacion : '') }}</textarea> 
                             
            </div>               
        </div>
            <div  id="caracteristicas" class="d-none" >
        @if(isset($equipo->caracteristicas))
          @foreach($equipo->caracteristicas as $id => $caracteristica) 
                <input name='caracteristicas[]' value="{{old('caracteristica->id', isset($equipo) ?$caracteristica->id :'')}}" id='input-"{{$caracteristica->id}}"' />
          @endforeach
          @endif
         </div>
        <div class="table-responsive row">
             <h5 class="text-center my-5 col-12">CARACTERISTICAS DEL EQUIPO:</h5>
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



                         @foreach($caracteristicas as $caracteristica)
                        <tr data-entry-id='{{$caracteristica->id}}'>
                            <td>
                                <input type='hidden' value='{{$caracteristica->id}}'  />
                            </td>
                            <td>
                                <input type='text'  class='nombre  d-none w-100' id='nombre-{{$caracteristica->id}}' value=nombre placeholder='Marca, Modelo, color, puerto, ...''><p class=''>{{$caracteristica->nombre}}</p>
                            </td>
                            <td>
                                <input type='text'  class='propiedad  d-none w-100' id='propiedad-{{$caracteristica->id}}' value='propiedad' placeholder='Marca, Modelo, color, puerto, ...'><p class=''>{{$caracteristica->propiedad}}</p>
                            </td>
                            <td>
                                <!--input type='button' value='Editar' class='update btn btn-xs w-100 btn-info' data-id='id' --><input type='button' class='btn btn-xs w-100 btn-danger delete' value='Eliminar  ' data-id='{{$caracteristica->id}}' >
                            </td>
                    </tr>
                        @endforeach

                  
                </tbody>
            </table>
        </div>         
        <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.equipos.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar">
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
    