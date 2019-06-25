<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyTipoRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Tipo;
use App\Dependencia;

class TipoController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('tipo_access'), 403);//Comparar si tiene permisos
        $tipos = Tipo::all();
        $notificacion = '';
        return view('admin.tipos.index', compact('tipos','notificacion' ));
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
            'nombre' => 'required|string',
            'descripcion' => 'string',
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
        $notificacion = 'Tipo agregado con exito.';
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
             'nombre' => 'required|string',
            'descripcion' => 'string',
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
        $notificacion = 'Tipo actualizado con exito.';
         return view('admin.tipos.index', compact('tipos', 'notificacion'));
    }

   

    public function destroy(Tipo $tipo){
        abort_unless(\Gate::allows('tipo_delete'), 403);
        $tipo->delete();       
         $tipos = Tipo::all();
        $notificacion = 'Tipo Eliminado con Exito.';
         return view('admin.tipos.index', compact('tipos', 'notificacion'));
    }

    public function massDestroy(MassDestroyTipoRequest $request){
        Tipo::whereIn('id', request('ids'))->delete();
        $tipos = Tipo::all();
        $notificacion = 'Tipos Eliminados con exito.';
         return view('admin.tipos.index', compact('tipos', 'notificacion'));
    }
}
