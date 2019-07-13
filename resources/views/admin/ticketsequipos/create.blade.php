@extends('layouts.admin')
@section('content')
<div class="breadcrumb">
      @component('partials.widget.breadcrumb')
        
        <li class="breadcrumb-item active" aria-current="page">Actividad: Reparacion y mantenimiento de Equipos</li>
          
      @endcomponent
  </div>
        @include('admin.tickets.create')

        <div class="card">
            <div class="card-header">
                 <h5 class="text-center mb-5">DATOS DEL EQUIPO.</h5>
            </div>
            <div class="card-body">
               
        
                <div class="row">
                    <div class="form-group {{ $errors->has('cliente')}} col-12 " id="aggEquipo">
                        <label for="cliente" class=" col-form-label text-md-right">Equipo:*</label>
                        <div class="">   
                         
                            <select class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} " name="cliente_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                 
                              
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
                <a class="btn btn-info" href="{{ route("admin.softwares.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>

</form>
@endsection
@section('scripts')
@parent


 <script type="text/javascript">

 </script>




@endsection