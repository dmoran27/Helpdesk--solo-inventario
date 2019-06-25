<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroySoftwareRequest;
use Illuminate\Support\Facades\Validator;
use App\Tipo;
use App\Software;

class SoftwareController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('software_access'), 403);//Comparar si tiene permisos
        $softwares = Software::all();
        return view('admin.softwares.index', compact('softwares'));
    }

     public function show(Software $software){
        abort_unless(\Gate::allows('software_show'), 403);
        return view('admin.softwares.show', compact('software'));
    }


    public function create(){
        $tipos = Tipo::all()->where('tipo', 'Software');
        abort_unless(\Gate::allows('software_create'), 403);
        return view('admin.softwares.create', compact('tipos'));
    }

    public function store(Request $request){
        abort_unless(\Gate::allows('software_create'), 403);
        $request["user_id"]=auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'tipo_id' => 'required',
            'descripcion' => 'required',
            'user_id' => 'required',
         ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.softwares.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $software = Software::create($request->all());
        $softwares = Software::all();
        $notificacion = array(
            'message' => 'Clientes agregados con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.softwares.index', compact('softwares', 'notificacion'));
    }

    public function edit(Software $software){
         $tipos = Tipo::all()->where('tipo', 'Software');
        abort_unless(\Gate::allows('software_edit'), 403);      
        return view('admin.softwares.edit', compact('tipos', 'software'));
    }

    public function update(Request $request, Software $software){
        abort_unless(\Gate::allows('software_edit'), 403); 
        $request["user_id"]=auth()->user()->id;   
          $validator = Validator::make($request->all(), [
           'nombre' => 'required|string|max:255',
            'tipos_id' => 'required',
            'descripcion' => 'required|string|max:255445',
            'user_id' => 'required',
         ]);
        $software->update($request->all());
        $softwares = Software::all();
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.softwares.index', compact('softwares', 'notificacion'));
    }

   

    public function destroy(Software $software){
        abort_unless(\Gate::allows('software_delete'), 403);
        $software->delete();       
        $notificacion = array(
            'message' => 'Usuario eliminado con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }

    public function massDestroy(MassDestroySoftwareRequest $request){
        Software::whereIn('id', request('ids'))->delete();
        $notificacion = array(
            'message' => 'Usuarios Eliminados con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }
}
