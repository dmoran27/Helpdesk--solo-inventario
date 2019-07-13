<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyPerifericoRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Caracteristica;
use App\Periferico;
use App\Tipo;

class PerifericoController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('periferico_access'), 403);//Comparar si tiene permisos
        $perifericos = Periferico::all();
         $notificacion = '';
        return view('admin.perifericos.index', compact('perifericos','notificacion' ));
    }

     public function show(Periferico $periferico){
        abort_unless(\Gate::allows('periferico_show'), 403);
        $periferico = Periferico::with(['tipo'])->findOrFail($periferico->id);
        return view('admin.perifericos.show', compact('periferico'));
    }

    public function create(){
        $caracteristicas = Caracteristica::all();
        $tipos = Tipo::all()->where('tipo', 'Periferico');
        $enumoption = General::getEnumValues('perifericos','perteneciente'); 
        $enumoption2 = General::getEnumValues('perifericos','estado');       
        abort_unless(\Gate::allows('periferico_create'), 403);
        return view('admin.perifericos.create', compact('enumoption2', 'enumoption','tipos', 'caracteristicas'));
    }

    public function store(Request $request){    
        $request["user_id"]=auth()->user()->id;
       
       abort_unless(\Gate::allows('periferico_create'), 403);
        
        $validator = Validator::make($request->all(), [
            'identificador' => 'required|unique:perifericos,identificador',
            'nombre' => 'required|string',
            'estado' => 'required|string',
            'perteneciente' => 'required|string',
            'observacion' => 'string|max:50',
            'user_id' => 'required|exists:users,id',
            'tipo_id' => 'required|exists:tipos,id',

        ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.perifericos.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $periferico = Periferico::create($request->all());
        return redirect()->route('admin.perifericos.edit', $periferico);
        
    }

    public function edit(Periferico $periferico){
        abort_unless(\Gate::allows('periferico_edit'), 403); 
       
        $caracteristicas=$periferico->caracteristicas()->get();
            
        $tipos = Tipo::all()->where('tipo', 'Periferico');
        $enumoption = General::getEnumValues('perifericos','perteneciente'); 
        $enumoption2 = General::getEnumValues('perifericos','estado');   
        $periferico->load('caracteristicas');
             
        return view('admin.perifericos.edit', compact('caracteristicas','enumoption', 'enumoption2', 'tipos','periferico'));
    }

    public function update(Request $request, Periferico $periferico){
         $request["user_id"]=auth()->user()->id;
        abort_unless(\Gate::allows('periferico_edit'), 403);
        $validator = Validator::make($request->all(), [
            'identificador' => 'unique:perifericos,identificador,'. $periferico->id,
            'nombre' => 'required|string',
            'estado' => 'required|string',
            'perteneciente' => 'required|string',
            'observacion' => 'string|max:50',
            'user_id' => 'required|exists:users,id',
            'tipo_id' => 'required|exists:tipos,id',
        


        ]);
        if ($validator->fails()) {        
            return redirect()
                        ->route('admin.perifericos.edit', $periferico)
                        ->withErrors($validator)
                        ->withInput();
            }

        Periferico::findOrFail($periferico->id)->update($request->all());
        $periferico->update($request->all());          
              
       $perifericos = Periferico::all();
       $notificacion = 'Periferico actualizado con Exito';
       return view('admin.perifericos.index', compact('perifericos', 'notificacion'));

    }


    public function destroy(Periferico $periferico){
        abort_unless(\Gate::allows('periferico_delete'), 403);
        $periferico->caracteristicas()->delete();
        $periferico->delete();
        $perifericos = Periferico::all();
         $notificacion = 'Periferico Eliminado con Exito';
        return view('admin.perifericos.index', compact('perifericos','notificacion' ));
    }



    public function massDestroy(MassDestroyPerifericoRequest $request){
        Periferico::whereIn('id', request('ids'))->delete();
       $perifericos = Periferico::all();
         $notificacion = 'Perifericos Eliminados con Exito';
        return view('admin.perifericos.index', compact('perifericos','notificacion' ));
    }

    public function CaracteristicaCreate(Request $request){
        
        abort_unless(\Gate::allows('caracteristica_create'), 403);
        $request["user_id"]=auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'propiedad' => 'required|string',
         ]);
        if ($validator->fails()) {            
           return  response()->json("fatal");
        }           

        $caracteristica = Caracteristica::create($request->all());
        $caracteristica->perifericos()->sync($request->periferico);
        $caracteristica->load('perifericos');
        return response()->json($caracteristica->id);        
    }

    public function CaracteristicaDelete(Request $request){
        $id= $request->caracteristica;
        $caracteristica = Caracteristica::findOrFail($id);
        $perif= $request->periferico;          
        $caracteristica->perifericos()->detach($perif);
        return response()->json(['success'=>'Eliminado.']);
       
    }

    
}
