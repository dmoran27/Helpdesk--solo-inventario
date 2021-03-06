

@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="card-body">
        <h5 class="text-center mb-5">DATOS DEL PERIFERICO.</h5>
        <form action="{{ route('admin.perifericos.update', [$periferico]) }}" method="POST" class="container-fluid formulario-ajax-editar" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="row">
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="nombre2">Nombre:*</label>
                <input type="text" id="nombre2" name="nombre" class="form-control" value="{{ old('nombre', isset($periferico) ? $periferico->nombre : '') }}">
                            
            </div>   
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">identificador:*</label>
                <input type="text" id="identificador" class="form-control" value="{{ old('nombre', isset($periferico) ? $periferico->nombre : '') }}">
                             
            </div> 
            <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Tipo:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} " name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}} " @if($tipo->id=== $periferico->tipo_id) selected @else '' @endif">{{$tipo->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
            <div class="form-group {{ $errors->has('perteneciente')}} col-12 col-md-6">
                <label for="perteneciente" class=" col-form-label text-md-right">Pertenece a la UNEXPO?*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $perteneciente)
                            <option value="{{$perteneciente}}"  @if($perteneciente === $periferico->perteneciente) selected @else '' @endif >{{$perteneciente}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado')}} col-12 col-md-6">
                <label for="estado" class=" col-form-label text-md-right">Estado del equipo:*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $estado)
                            <option value="{{$estado}}" @if($estado === $periferico->estado) selected @else '' @endif >{{$estado}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <textarea type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion', isset($periferico) ? $periferico->observacion : '') }}">{{ old('observacion', isset($periferico) ? $periferico->observacion : '') }}</textarea> 
                               
            </div>               
        </div>
            <!--*           Errores         -->
            @include('partials.widget.errors')
       
          <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.perifericos.index") }}">
                    Volver
                </a>
                <input class="btn btn-danger btn-ajax-editar" type="submit"  value="Actualizar">
          </div>   
    </div>
</div>
<div class="card">  
    <div class="card-header"> 
        <h5 class="text-center my-5 col-12">CARACTERISTICAS DEL PERIFERICO:</h5>
    </div>
    <div class="card-body"> 
        <div class="table-responsive row">
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
                                <input type='button' class='btn btn-xs w-100 btn-danger delete' value='Eliminar  ' data-id='{{$caracteristica->id}}' >
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


    <script type='text/javascript'>
   
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      // Add record

      $("#guardar-periferico").on("click", function(e){
      e.preventDefault();
      alert("d");
        // Capturamnos el boton de envío          
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
                type: $('.formulario-ajax').attr("method"),
                url: $('.formulario-ajax').attr("action"),
                data:$('.formulario-ajax').serialize(),
                
            }).done(function(data){
              alert(data);
                if(data > 0){
                    swal("Felicidades!", "Elemento Actualizado correctamente!", "success");
                  }else if(data == 0){
                    swal("UPS!", "Error en el servidor!", "danger");
                    alert('Error.');
                  }else{
                    alert(data);
                  }   
             }).fail(function(x,xs,xt){
                  //nos dara el error si es que hay alguno
                 // window.open(JSON.stringify(x));
                alert('error: ' + x+"\n error string: "+ xs + "\n error throwed: " + xt);
            });
       

    });

    $('#add').click(function(){
        var nombre = $("#nombre").val();
        var propiedad = $('#propiedad').val();
        var periferico = {{$periferico->id}};
        if(nombre != '' && propiedad != '' ){             
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
                url: '{{ route("admin.periferico.caracteristica.store") }}',
                type: 'POST',
                data: {nombre:nombre, propiedad:propiedad, periferico:periferico},
                
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

  
    // Delete record
 $(document).on("click", ".delete" , function() {
      var delete_id = $(this).data('id');
      var peri= {{$periferico->id}};
     console.log(delete_id);
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
                url: '{{ route("admin.periferico.caracteristica.delete") }}',
                data: {_token: CSRF_TOKEN, periferico:peri, caracteristica:delete_id},
                type: 'delete'
            })
                .done( function(response){
                    console.log(response);
                    swal("Felicidades!", "Elemento Eliminado correctamente!", "success");
                    $(el).closest( "tr" ).remove();
                    $('#caracteristicas #input-'+delete_id).remove();
                }).fail(function(response){console.log(response);
            
                 });
        } 
    });
 });  
 

</script>

@endsection


