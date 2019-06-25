


<div class="row">
    <div class="col">                

    <div class="row">
      <div class="col-12">
        <h5 class="text-center mb-5">DATOS DEL CLIENTE.</h5>
      </div>
    </div>

         <div id='type'>
                <label for="radio_1">Crear cliente</label>
                <input type='radio' id='radio_1' name='type' value='1' />
                <label for="radio_1">Agregar cliente</label>
                <input type='radio' id='radio_2' name='type' value='2' />
                
        </div> 
        <div class="row">
            <div class="form-group {{ $errors->has('cliente')}} col-12 d-none" id="aggCliente">
                <label for="cliente" class=" col-form-label text-md-right">cliente:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} " name="cliente_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         
                      
                      </select>
                    
                </div>
            </div>
        </div>

        <div class="cliente row d-none" id="crearCliente">
                
                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-4">
                    <label for="nombre">{{ trans('global.cliente.fields.nombre') }}*</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
                                
                </div>

                <div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }} col-12 col-md-4">
                    <label for="apellido">{{ trans('global.cliente.fields.apellido') }}*</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido') }}">
               
                </div>

                <div class="form-group {{ $errors->has('cedula') ? 'has-error' : '' }} col-12 col-md-4">
                    <label for="cedula">{{ trans('global.cliente.fields.cedula') }}*</label>
                    <input type="text" id="cedula" name="cedula" class="form-control" value="{{ old('cedula') }}">
                               
                </div>

                <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                    <label for="telefono">{{ trans('global.cliente.fields.telefono') }}*</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text"  id="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }} data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" name="telefono" value="{{ old('telefono') }}">
                      </div>

                </div>
                
               <div class="form-group {{ $errors->has('sexo')}} col-12 col-md-6">
                    <label for="sexo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.sexo') }}*</label>
                    <div class="">   
                        <select class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            
                          
                          </select>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('tipo')}} col-12 col-md-6">
                    <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.tipo') }}*</label>
                    <div class="">   
                        <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" style="width: 100%;" tabindex="-1" aria-hidden="true">

                          </select>
                    </div>
                </div>
                     
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} col-12">
                    <label for="email">{{ trans('global.cliente.fields.email') }}*</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                   
                </div>
                <div class="form-group {{ $errors->has('dependencia')}} col-12">
                    <label for="dependencia" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.dependencia') }}*</label>
                    <div class="">   
                     
                        <select class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} " name="dependencia_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           
                          
                          </select>
                        
                    </div>
                </div>
                 <div class="form-group row">
                    <div class="col-md-6">
                        <input id="user_id" type="hidden" class="hidden" name="user_id">
                    </div>
                </div>
                  
                <div>
                    <button id="agregar" class="btn btn-danger"  value="Guardar  "></button>
                </div>          
        </div>

    <div class="row">
      <div class="col-12">
        <h5 class="text-center mb-5">DATOS DEL SERVICIO.</h5>
      </div>
    </div>
    <div class="row">
                 <div class="form-group {{ $errors->has('prioridad')}} col-12 col-md-6">
                <label for="prioridad" class=" col-form-label text-md-right">Prioridad*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('prioridad') ? ' is-invalid' : '' }}" name="prioridad" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        
                      
                      </select>
                </div>
            </div>

            <div class="form-group {{ $errors->has('traslado_servicio')}} col-12 col-md-6">
                <label for="traslado_servicio" class=" col-form-label text-md-right">Servicio con traslado?*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('traslado_servicio') ? ' is-invalid' : '' }}" name="traslado_servicio" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        
                      
                      </select>
                </div>
            </div>

        </div>

        <div class="row">
                        <div class="form-group {{ $errors->has('lugar') ? 'has-error' : '' }} col-12">
                <label for="lugar">Lugar:*</label>
                <input type="text" id="lugar" name="lugar" class="form-control" value="{{ old('lugar') }}">
             
            </div>  
         
        </div>  
         <div class="row">
                <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <input type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion') }}">
                              
            </div>
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
             <div class="form-group {{ $errors->has('user')}} col-12">
                <label for="user" class=" col-form-label text-md-right">Asignar Usuario:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }} " name="user_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         
                      </select>
                    
                </div>
            </div>
        </div>

             
             <div class="form-group {{ $errors->has('perifericos') ? 'has-error' : '' }} col-12">
                <label for="perifericos" class="w-100">Tipo de Actividad:</label>
                <select name="perifericos[]" id="perifericos" class="form-control w-100 select2">
                   
                </select>
               
            </div>

</div>
</div>
 <script type="text/javascript">


 </script>












