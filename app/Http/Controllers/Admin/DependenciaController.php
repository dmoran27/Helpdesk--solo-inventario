<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyDependenciaRequest;
use Illuminate\Support\Facades\Validator;
use App\Edificio;
use App\Dependencia;

class DependenciaController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('dependencia_access'), 403);//Comparar si tiene permisos
        $dependencias = Dependencia::all();
        $notificacion = '';
        return view('admin.dependencias.index', compact('dependencias','notificacion' ));
    }

     public function show(Dependencia $dependencia){
        abort_unless(\Gate::allows('dependencia_show'), 403);
        return view('admin.dependencias.show', compact('dependencia'));
    }


    public function create(){
        $edificios = Edificio::all();
        abort_unless(\Gate::allows('dependencia_create'), 403);
        return view('admin.dependencias.create', compact('edificios'));
    }

    public function store(Request $request){
        $request["user_id"]=auth()->user()->id;
        abort_unless(\Gate::allows('dependencia_create'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:dependencias,nombre',
            'piso' => 'required|string',
            'edificio_id' => 'required',
         ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.dependencias.create')
                        ->withErrors($validator)
                        ->withInput();
            }    
        $dependencia = Dependencia::create($request->all());
        $dependencias = Dependencia::all();
        $notificacion = 'Dependencia agregada con exito.';
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }

    public function edit(Dependencia $dependencia){    
        $dependencia->load('edificio');
        $edificios = Edificio::all();
        abort_unless(\Gate::allows('dependencia_edit'), 403);      
        return view('admin.dependencias.edit', compact('edificios', 'dependencia'));
    }

    public function update(Request $request, Dependencia $dependencia){
        $request["user_id"]=auth()->user()->id;
        abort_unless(\Gate::allows('dependencia_edit'), 403);    
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:dependencias,nombre,'.$dependencia->id,
            'piso' => 'required|string',
            'edificio_id' => 'required',
         ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.dependencias.edit',$dependencia)
                        ->withErrors($validator)
                        ->withInput();
            }   
        $dependencia->update($request->all());
        $dependencias = Dependencia::all();
        $notificacion = 'Dependencia actualizada con exito.';
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }

   

    public function destroy(Dependencia $dependencia){
        abort_unless(\Gate::allows('dependencia_delete'), 403);
        $dependencia->delete();       
        $dependencias = Dependencia::all();
        $notificacion = 'Dependencia Eliminada con exito.';
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }

    public function massDestroy(MassDestroyDependenciaRequest $request){
        Dependencia::whereIn('id', request('ids'))->delete();
        $dependencias = Dependencia::all();
        $notificacion = 'Dependencia Eliminada con exito.';
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }
}
