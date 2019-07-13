<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyEquipoRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Caracteristica;
use App\Equipo;
use App\Periferico;
use App\Software;
use App\Tipo;
use App\Dependencia;

class EquipoController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('equipo_access'), 403);//Comparar si tiene permisos
        $equipos = Equipo::all();
         $notificacion = '';
        return view('admin.equipos.index', compact('equipos','notificacion' ));
    }

     public function show(Equipo $equipo){
        abort_unless(\Gate::allows('equipo_show'), 403);
        $equipo->load('caracteristicas', 'perifericos','softwares');
        return view('admin.equipos.show', compact('equipo'));
    }

    public function create(){
        $caracteristicas = Caracteristica::all();
        $softwares = Software::all();
        $equipos = Equipo::all();
        $tipos=Tipo::All()->where('tipo', 'Equipo');
         $enumoption = General::getEnumValues('equipos','perteneciente'); 
        $enumoption2 = General::getEnumValues('equipos','estado_equipo');  
        $perifericos = Periferico::where([['estado', '!=', 'Dañado'], ['estado', '!
            =', 'Obsoleto']]);

        $dependencias = Dependencia::All();
        abort_unless(\Gate::allows('equipo_create'), 403);
        return view('admin.equipos.create', compact( 'caracteristicas','dependencias', 'enumoption','softwares', 'tipos','enumoption2','perifericos'));
    }

    public function store(Request $request){    
       abort_unless(\Gate::allows('equipo_create'), 403);
       $request["user_id"]=auth()->user()->id;
        $validator = Validator::make($request->all(), [
             'identificador' => 'required|unique:perifericos,identificador',
            'nombre' => 'required|string',
            'estado' => 'required|string',
            'perteneciente' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'dependencia_id' => 'required|exists:dependencias,id',
            'tipo_id' => 'required|exists:tipos,id',
        ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.equipos.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $equipo = Equipo::create($request->all());
    if ($request->input('perifericos', [])) {
        $equipo->perifericos()->attach($request->input('perifericos', []));
       
    }
    if ($request->input('softwares', [])) {
       $equipo->softwares()->attach($request->input('softwares', []));
       
    }    
        
        return redirect()->route('admin.equipos.edit', $equipo);
    }

    public function edit(Equipo $equipo){
         abort_unless(\Gate::allows('equipo_edit'), 403);    
         
        $caracteristicas=$equipo->caracteristicas()->get();
        $softwares = Software::all();
        $tipos=Tipo::All()->where('tipo', 'Equipo');
         $enumoption = General::getEnumValues('equipos','perteneciente'); 
        $enumoption2 = General::getEnumValues('equipos','estado_equipo');  
        $perifericos = Periferico::all();     
        $dependencias = Dependencia::All();
         $equipo->load('caracteristicas'); 
        abort_unless(\Gate::allows('equipo_create'), 403);
        return view('admin.equipos.edit', compact( 'equipo','caracteristicas','dependencias', 'enumoption','softwares', 'tipos','enumoption2','perifericos'));
    }

    public function update(Request $request, Equipo $equipo){

        abort_unless(\Gate::allows('equipo_edit'), 403);
        $validator = Validator::make($request->all(), [
            

        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.equipos.edit', $equipo)
                        ->withErrors($validator)
                        ->withInput();
            }
        $array11=$equipo->perifericos()->get();
        $array22=$request->input('perifericos', []);
        foreach ($array11 as $value11) {
            $encontrado=false;
            foreach ($array22 as $value22) {
                if ($value11 == $value22){
                    $encontrado=true;
                    $break;
                }
            }
            if ($encontrado == false){
               $equipo = Equipo::findOrFail($equipo->id);
               $perifericos_id = $value11;
                $equipo->perifericos()->detach($equipo);  
            }
        }
        $array111=$equipo->softwares()->get();
        $array222=$request->input('softwares', []);
        foreach ($array111 as $value111) {
            $encontrado=false;
            foreach ($array222 as $value222) {
                if ($value111 == $value222){
                    $encontrado=true;
                    $break;
                }
            }
            if ($encontrado == false){
               $equipo = Equipo::findOrFail($equipo->id);
               $softwares_id = $value111;
                $equipo->softwares()->detach($equipo);  
            }
        }
         Equipo::findOrFail($equipo->id)->update($request->all());
        $equipo->update($request->all());
    if ($request->input('perifericos', [])) {
       
        $equipo->perifericos()->sync($request->input('perifericos', []));
       
    }
    if ($request->input('softwares', [])) {
      
       $equipo->softwares()->sync($request->input('softwares', []));
       
    }    
               
        $equipos = Equipo::all();
        $notificacion = 'Equipo Actualizado con Exito';
        return view('admin.equipos.index', compact('equipos','notificacion' ));

    }

   

    public function destroy(Equipo $equipo){
        abort_unless(\Gate::allows('equipo_delete'), 403);
        $equipo->delete();  
        $equipos = Equipo::all();     
         $notificacion = 'Equipo Eliminado con exito';
        return view('admin.equipos.index', compact('equipos','notificacion' ));
    }

    public function massDestroy(MassDestroyEquipoRequest $request){
        Equipo::whereIn('id', request('ids'))->delete();
        $equipos = Equipo::all();
        $notificacion = 'Equipos Esliminados con  exito';
        return view('admin.equipos.index', compact('equipos','notificacion' ));
    }

    public function caracteristicaCreate(Request $request){
        
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
        $caracteristica->equipos()->sync($request->equipo);
        $caracteristica->load('equipos');
        return response()->json($caracteristica->id);        
    }

    public function caracteristicaDelete(Request $request){
       
        $id= $request->caracteristica;
        $caracteristica = Caracteristica::findOrFail($id);
        $equipo= $request->equipo;      
        $caracteristica->equipos()->detach($equipo);

       
    }
}
