<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyTipoRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Tipo;
use App\Dependencia;

class TicketController extends Controller{ 

    public function store(Request $request){
        $request["user_id_creador"]=auth()->user()->id;
        if (!$request["user_id_asignado"]) {
            $request["user_id_asignado"]=auth()->user()->id;
        }


        $validator = Validator::make($request->all(), [
            'user_id'=> 'required',
            'identificador'=> 'required|unique:tickets,identificador',
            'tipo_id'=> 'required',
            'estado'=> 'required',
            'accion'=> 'required',
            'prioridad'=> 'required',
            'observacion'=> 'nullable',
            'tiempo_i'=> 'nullable',
            'tiempo_c'=> 'nullable',
            'user_id_creador'=> 'required',
            'user_id_asignado'=> 'required',
            'lugar'=> 'nullable',
            'traslado_servicio'=> 'required',
            'traslado_ticket'=> 'required',
            'cod_traslado'=> 'required',
            'cliente_id'=> 'required',
        ]);
        if (!$request["traslado_servicio"]) {
            $request["traslado_servicio"]=$request["identificador"];
        }
        if ($validator->fails()) {    
            return  response()->json($validator);
        }
        $ticket = Ticket::create($request->all());
         return  response()->json($ticket->id);


    }

    public function update(Request $request, Ticket $ticket){
        $request["user_id_creador"]=auth()->user()->id;
        if (!$request["user_id_asignado"]) {
            $request["user_id_asignado"]=auth()->user()->id;
        }
        if (!$request["traslado_servicio"]) {
            $request["traslado_servicio"]=$request["identificador"];
        }


        $validator = Validator::make($request->all(), [
            'user_id'=> 'required',
            'identificador'=> 'required|unique:tickets,identificador,'.$ticket->id,
            'tipo_id'=> 'required',
            'estado'=> 'required',
            'accion'=> 'required',
            'prioridad'=> 'required',
            'observacion'=> 'nullable',
            'tiempo_i'=> 'nullable',
            'tiempo_c'=> 'nullable',
            'user_id_creador'=> 'required',
            'user_id_asignado'=> 'required',
            'lugar'=> 'nullable',
            'traslado_servicio'=> 'required',
            'traslado_ticket'=> 'required',
            'cod_traslado'=> 'required',
            'cliente_id'=> 'required',
        ]);
        if ($validator->fails()) {    
            return  response()->json($validator);
        }
       
        $ticket->update($request->all());
         return  response()->json($ticket->id);
    }

   

    public function destroy(Tipo $tipo){
        abort_unless(\Gate::allows('tipo_delete'), 403);
        $tipo->delete();       
        $notificacion = array(
            'message' => 'Usuario eliminado con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }

    public function massDestroy(MassDestroyTipoRequest $request){
        Tipo::whereIn('id', request('ids'))->delete();
        $notificacion = array(
            'message' => 'Usuarios Eliminados con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }
}
