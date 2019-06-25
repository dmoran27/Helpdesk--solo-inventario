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

    public function index(){        
       
    }

     public function show(Tipo $tipo){
        abort_unless(\Gate::allows('tipo_show'), 403);
        return view('admin.tipos.show', compact('tipo'));
    }

    public function create(){
        $enumoption2 = General::getEnumValues('tipos','tipo');
        abort_unless(\Gate::allows('tipo_create'), 403);
        return view('admin.tipos.create', compact('enumoption2'));
    }

    public function store(Request $request){
        abort_unless(\Gate::allows('tipo_create'), 403);
        $request["user_id"]=auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required',
            'user_id'=> 'required',
        ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.tipos.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $tipo = Tipo::create($request->all());
        $tipos = Tipo::all();
        $notificacion = array(
            'message' => 'tipos agregados con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.tipos.index', compact('tipos', 'notificacion'));
    }

    public function edit(Tipo $tipo){
       
         $enumoption2 = General::getEnumValues('tipos','tipo');
        abort_unless(\Gate::allows('tipo_edit'), 403);      
        return view('admin.tipos.edit', compact('enumoption2', 'tipo'));
    }

    public function update(Request $request, Tipo $tipo){
        abort_unless(\Gate::allows('tipo_edit'), 403); 
         $request["user_id"]=auth()->user()->id;
        $validator = Validator::make($request->all(), [
             'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required',
            'user_id'=> 'required',
        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.tipos.edit', $user)
                        ->withErrors($validator)
                        ->withInput();
            }  
        
        $tipo->update($request->all());
        $tipos = Tipo::all();
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.tipos.index', compact('tipos', 'notificacion'));
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
