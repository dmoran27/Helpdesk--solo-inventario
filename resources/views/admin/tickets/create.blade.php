
<form action="{{ route('admin.tickets.store') }}" method="POST" class="formulario-ajax-ticket container-fluid" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
          <h5 class="text-center mb-5">DATOS DEL USUARIO.</h5>
    </div>
    <div class="card-body">
           <div class="form-group {{ $errors->has('cliente')}} ">
                <label for="cliente" class=" col-form-label text-md-right">cliente de actividad:*</label>
                <div class="">   
                 
                    <select class="select2 form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} " name="cliente_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($cliente as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}{{$cliente->apellido}}-{{$cliente->cedula}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
                    
    </div> 
    
</div>
<div class="card">
    <div class="card-header">
          <h5 class="text-center mb-5">DATOS DE LA ACTIVIDAD.</h5>
    </div>
    <div class="card-body">
        
        <div class="row"> 
             <div class="form-group {{ $errors->has('estado')}} col-12 col-md-4">
                <label for="estado" class=" col-form-label text-md-right">Estado de la actividad*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($estado as $estado)
                            <option value="{{$estado}}">{{$estado}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>

            <div class="form-group {{ $errors->has('prioridad')}} col-12 col-md-4">
                <label for="prioridad" class=" col-form-label text-md-right">Prioridad de la actividad*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('prioridad') ? ' is-invalid' : '' }}" name="prioridad" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($prioridad as $prioridad)
                            <option value="{{$prioridad}}">{{$prioridad}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('accion')}} col-12 col-md-4">
                <label for="accion" class=" col-form-label text-md-right">Accion efectuada sobre la actividad*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('accion') ? ' is-invalid' : '' }}" name="accion" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($accion as $accion)
                            <option value="{{$accion}}">{{$accion}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Tipo de actividad:*</label>
                <div class="">   
                 
                    <select class=" select2 form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} " name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div>         
        </div> 

        <div class="row">
           
            <div class="form-group {{ $errors->has('tiempo_i') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="tiempo_i">Fecha de Inicio:*</label>
                <input type="date" id="tiempo_i" name="tiempo_i" class="form-control" value="{{ old('tiempo_i') }}">
                             
            </div>
            <div class="form-group {{ $errors->has('tiempo_c') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="tiempo_c">Fecha Final:*</label>
                <input type="date" id="tiempo_c" name="tiempo_c" class="form-control" value="{{ old('tiempo_c') }}">
                             
            </div>

        </div>
        <div class="row"> 

            <div class="form-group {{ $errors->has('usuario')}} col-12">
                    <label for="usuario" class=" col-form-label text-md-right">Asignar actividad a Usuario:*</label>
                    <div class="">   
                     
                        <select class="select2 form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }} " name="usuario_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                             @foreach($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}} {{$usuario->cedula}}</option>
                            @endforeach
                          
                          </select>
                        
                    </div>
            </div>
             <div class="form-group {{ $errors->has('lugar') ? 'has-error' : '' }} col-12">
                <label for="lugar">Lugar:*</label>
                <textarea type="text" id="lugar" name="lugar" class="form-control" value="{{ old('lugar') }}"></textarea>
             
            </div>  
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                    <label for="observacion">Observación:*</label>
                    <textarea type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion') }}"> </textarea>                
            </div>
        </div>
        <div class="row"> 
                <div class="form-group {{ $errors->has('traslado_servicio')}} col-12 col-md-6">
                    <label for="traslado_servicio" class=" col-form-label text-md-right">Servicio con traslado_*</label>
                    <div class="">   
                        <select class="form-control{{ $errors->has('traslado_servicio') ? ' is-invalid' : '' }}" name="traslado_servicio" style="width: 100%;" tabindex="-1" aria-hidden="true">
                             @foreach($traslado_servicio as $traslado_servicio)
                                <option value="{{$traslado_servicio}}">{{$traslado_servicio}}</option>
                            @endforeach
                          
                          </select>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('traslado_ticket')}} col-12 col-md-6">
                    <label for="traslado_ticket" class=" col-form-label text-md-right">Actividad Trasladada?*</label>
                    <div class="">   
                        <select class="form-control{{ $errors->has('traslado_ticket') ? ' is-invalid' : '' }}" name="traslado_ticket" style="width: 100%;" tabindex="-1" aria-hidden="true">
                             @foreach($traslado_ticket as $traslado_ticket)
                                <option value="{{$traslado_ticket}}">{{$traslado_ticket}}</option>
                            @endforeach
                          
                          </select>
                    </div>
                </div>
        </div>
</div>
</div>

 <!--*           Errores         -->
            @include('partials.widget.errors')

            <!--*      boton de envio   -->
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.equipos.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar Actividad">
            </div>
       
</form>

@section('scripts')
@parent


    <script type='text/javascript'>
   
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      // Add record
    $(".formulario-ajax-ticket").bind("submit", function(){
        // Capturamnos el boton de envío
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),
                
            }).done(function(data){
                if(data > 0){
                    swal("Felicidades!", "Elemento Agregado correctamente!", "success");
                    
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
                  @include('partials.widget.errors')
            });
        
      

    });
</script>

@endsection









