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
        $equipo->load('caracteristicas', 'perifericos');
        return view('admin.equipos.show', compact('equipo'));
    }

    public function create(){
        $caracteristicas = Caracteristica::all();
        $softwares = Software::all();
        $tipos=Tipo::All()->where('tipo', 'Equipo');
         $enumoption = General::getEnumValues('equipos','perteneciente'); 
        $enumoption2 = General::getEnumValues('equipos','estado_equipo');  
        $perifericos = Periferico::all();     
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
            'observacion' => 'string|max:50',
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
        $equipo->caracteristicas()->sync($request->input('caracteristicas', []));
        $equipo->caracteristicas()->sync($request->input('perifericos', []));
        $equipo->caracteristicas()->sync($request->input('softwares', []));
        $equipo->load('caracteristicas', 'perifericos','softwares');
        $equipos = Equipo::all();
         $notificacion = 'Equipo agregado con exito';
        return view('admin.equipos.index', compact('equipos','notificacion' ));
    }

    public function edit(Equipo $equipo){
        $caracteristicas = Caracteristica::all()->pluck('title', 'id');
        $areas = Area::all();
        $enumoption = General::getEnumValues('equipos','sexo');
         $dependencias = Dependencia::All();
        $equipo->load('caracteristicas');
        abort_unless(\Gate::allows('equipo_edit'), 403);      
        return view('admin.equipos.edit', compact('caracteristicas','dependencias','enumoption', 'areas', 'equipo'));
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
       $array1=$equipo->caracteristicas()->get();
        $array2=$request->input('caracteristicas', []);
        foreach ($array1 as $value1) {
            $encontrado=false;
            foreach ($array2 as $value2) {
                if ($value1 == $value2){
                    $encontrado=true;
                    $break;
                }
            }
            if ($encontrado == false){
               $equipo = Equipo::findOrFail($equipo->id);
               $caracteristica_id = $value1;
                $equipo->caracteristicas()->detach($caracteristica_id);  
            }
        }
         Equipo::findOrFail($equipo->id)->update($request->all());
        $equipo->update($request->all());
        $equipo->caracteristicas()->sync($request->input('caracteristicas', []));
        $equipo->load('caracteristicas');
               
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
}
