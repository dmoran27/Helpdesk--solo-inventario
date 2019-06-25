<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyEdificioRequest;
use Illuminate\Support\Facades\Validator;

use App\Edificio;

class EdificioController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('edificio_access'), 403);//Comparar si tiene permisos
        $edificios = Edificio::all();
        $notificacion = '';
        return view('admin.edificios.index', compact('edificios','notificacion' ));
    }

     public function show(Edificio $edificio){
        abort_unless(\Gate::allows('edificio_show'), 403);
        return view('admin.edificios.show', compact('edificio'));
    }

    public function create(){
        $edificios = Edificio::all();    
        abort_unless(\Gate::allows('edificio_create'), 403);
        return view('admin.edificios.create', compact('edificios'));
    }

    public function store(Request $request){   
    $request["user_id"]=auth()->user()->id; 
       abort_unless(\Gate::allows('edificio_create'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:edificios,nombre,',
            'descripcion' => 'string',
         ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.edificios.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $edificio = Edificio::create($request->all());
        $edificios = Edificio::all();
        $notificacion = 'Edificio agregado con exito.';

        return view('admin.edificios.index', compact('edificios', 'notificacion'));
    }

    public function edit(Edificio $edificio){
        
        $edificios = Edificio::all();
        abort_unless(\Gate::allows('edificio_edit'), 403);      
        return view('admin.edificios.edit', compact('edificio'));
    }

    public function update(Request $request, Edificio $edificio){
        $request["user_id"]=auth()->user()->id;
        abort_unless(\Gate::allows('edificio_edit'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:edificios,nombre,' .$edificio->id,
            'descripcion' => 'string',

        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.edificios.edit', $edificio)
                        ->withErrors($validator)
                        ->withInput();
            }
      
         Edificio::findOrFail($edificio->id)->update($request->all());
        $edificio->update($request->all());
        $edificios = Edificio::all();
        $notificacion = 'Edificio Actualizado con exito.';
        return view('admin.edificios.index', compact('edificios', 'notificacion'));

    }

   

    public function destroy(Edificio $edificio){
        abort_unless(\Gate::allows('edificio_delete'), 403);
        $edificio->delete();       
        $edificios = Edificio::all();
        $notificacion = 'Edificio Eliminado con exito.';
        return view('admin.edificios.index', compact('edificios', 'notificacion'));
    }

    public function massDestroy(MassDestroyEdificioRequest $request){
        Edificio::whereIn('id', request('ids'))->delete();
        $edificios = Edificio::all();
        $notificacion = 'Edificio Eliminados con exito.';
        return view('admin.edificios.index', compact('edificios', 'notificacion'));
    }
}
