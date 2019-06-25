

@extends('layouts.admin')
@section('content')

@include('admin.tickets.create')

 <div class="row">
			<div class="col-12">
				<h5 class="text-center mb-5">DATOS DEL EQUIPO.</h5>
			</div>
		</div>
		 <div id='type'>
                <label for="radio_cequipo">Crear equipo</label>
                <input type='radio' id='radio_cequipo' name='type' value='1' />
                <label for="radio_aequipo">Agregar equipo</label>
                <input type='radio' id='radio_aequipo' name='type' value='2' />
                
        </div> 
        <div class="row">
            <div class="form-group {{ $errors->has('cliente')}} col-12 d-none" id="aggEquipo">
                <label for="cliente" class=" col-form-label text-md-right">Equipo:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} " name="cliente_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         
                      
                      </select>
                    
                </div>
            </div>
        </div>

        <div class="cliente row d-none" id="crearEquipo">
			<div class="row">
             
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Identificador:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control" value="{{ old('identificador') }}">
                              
            </div> 
             <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="nombre2">Nombre:*</label>
                <input type="text" id="nombre2" name="nombre" class="form-control" value="{{ old('nombre') }}">
                             
            </div> 
             <div class="form-group {{ $errors->has('marca') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="marca2">Marca:*</label>
                <input type="text" id="marca2" name="marca" class="form-control" value="{{ old('marca') }}">
           
            </div> 
             <div class="form-group {{ $errors->has('modelo') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="modelo2">Modelo:*</label>
                <input type="text" id="modelo2" name="modelo" class="form-control" value="{{ old('modelo') }}">
            </div> 
             <div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="serial2">Serial:*</label>
                <input type="text" id="serial2" name="serial" class="form-control" value="{{ old('serial') }}">
              
            </div> 
            <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Tipo:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} " name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                       
                      </select>
                    
                </div>
            </div> 
            <div class="form-group {{ $errors->has('softwares') ? 'has-error' : '' }} col-12">
                <label for="softwares" class="w-100">Softwares del equipo
                    <span class="btn btn-info btn-xs select-all">Seleccionar todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span></label>
                <select name="softwares[]" id="softwares" class="form-control w-100 select2" multiple="multiple">
                   
                </select>
               
            </div>
             <div class="form-group {{ $errors->has('perifericos') ? 'has-error' : '' }} col-12">
                <label for="perifericos" class="w-100">Perifericos del equipo
                    <span class="btn btn-info btn-xs select-all">Seleccionar todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span></label>
                <select name="perifericos[]" id="perifericos" class="form-control w-100 select2" multiple="multiple">
                   
                </select>
               
            </div>
            <div class="form-group {{ $errors->has('perteneciente')}} col-12 col-md-6">
                <label for="perteneciente" class=" col-form-label text-md-right">Pertenece a la UNEXPO?*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado')}} col-12 col-md-6">
                <label for="estado" class=" col-form-label text-md-right">Estado del equipo:*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <input type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion') }}">
                               
            </div>               
        </div>
           
          <div  id="caracteristicas" class="d-none" >
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
</div>
@endsection
@section('scripts')
@parent


 <script type="text/javascript">

$(document).ready(function(){  
                          
    $("#radio_1").on("click", function() {
            $('#aggCliente').removeClass("d-none");
            $('#crearCliente').addClass("d-none");

     });
$("#radio_2").on("click", function() {
           $('#crearCliente').removeClass("d-none");
           $('#aggCliente').addClass("d-none");

       

 
});
  $("#radio_aequipo").on("click", function() {
            $('#aggEquipo').removeClass("d-none");
            $('#crearEquipo').addClass("d-none");

     });
$("#radio_cequipo").on("click", function() {
           $('#crearEquipo').removeClass("d-none");
           $('#aggEquipo').addClass("d-none");

       

 
});
    
});
 </script>




@endsection