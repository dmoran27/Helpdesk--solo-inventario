<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyAreaRequest;
use Illuminate\Support\Facades\Validator;

use App\Area;

class AreaController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('area_access'), 403);//Comparar si tiene permisos
        $areas = Area::all();
        $notificacion = '';
        return view('admin.areas.index', compact('areas','notificacion' ));
    }

     public function show(Area $area){
        abort_unless(\Gate::allows('area_show'), 403);
        return view('admin.areas.show', compact('area'));
    }

    public function create(){
        $areas = Area::all();    
        abort_unless(\Gate::allows('area_create'), 403);
        return view('admin.areas.create', compact('areas'));
    }

    public function store(Request $request){    
       abort_unless(\Gate::allows('area_create'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:areas,nombre',
            'descripcion' => 'required|string',
         ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.areas.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $area = Area::create($request->all());
        $areas = Area::all();
          $notificacion = 'Area agregada con exito.';

        return view('admin.areas.index', compact('areas', 'notificacion'));
    }

    public function edit(Area $area){
        $areas = Area::all();
        abort_unless(\Gate::allows('area_edit'), 403);      
        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area){

        abort_unless(\Gate::allows('area_edit'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:areas,nombre,' .$area->id,
            'descripcion' => 'required|string',

        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.areas.edit', $area)
                        ->withErrors($validator)
                        ->withInput();
            }
      
         Area::findOrFail($area->id)->update($request->all());
        $area->update($request->all());
        $areas = Area::all();
        $notificacion = 'Area actializada con exito.';
        return view('admin.areas.index', compact('areas', 'notificacion'));

    }

   

    public function destroy(Area $area){
        abort_unless(\Gate::allows('area_delete'), 403);
        $area->delete();       
        $areas = Area::all();
        $notificacion = 'Area eliminada con exito.';
        return view('admin.areas.index', compact('areas', 'notificacion'));
    }

    public function massDestroy(MassDestroyAreaRequest $request){
        Area::whereIn('id', request('ids'))->delete();
         $areas = Area::all();
        
       $notificacion = 'Areas Eliminadas con exito.';
        return view('admin.areas.index', compact('areas', 'notificacion'));
    }
}
