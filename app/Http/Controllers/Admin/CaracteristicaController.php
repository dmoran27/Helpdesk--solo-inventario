<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyCaracteristicaRequest;
use App\Http\Requests\Admin\StoreCaracteristicaRequest;
use App\Http\Requests\Admin\UpdateCaracteristicaRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Role;
use App\Caracteristica;
use App\Area;

class CaracteristicaController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('caracteristica_access'), 403);
        $caracteristicas = Caracteristica::all();
        return response()->json($caracteristicas);
    }

    public function store(Request $request)
    {
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
        return response()->json($caracteristica->id);
    }

    public function update(Request $request, $id)
    {
        abort_unless(\Gate::allows('caracteristica_edit'), 403);
        $request["user_id"]=auth()->user()->id;
        
        $caracteristica = Caracteristica::update($request->all());
        return response()->json($caracteristica->id);
    }

    public function show(Caracteristica $caracteristica)
    {
        abort_unless(\Gate::allows('caracteristica_show'), 403);
        return view('admin.caracteristicas.show', compact('Caracteristica'));
    }

    public function destroy(Request $request)
    {
        abort_unless(\Gate::allows('caracteristica_delete'), 403);
        $id= $request->caracteristica;
         $caracteristica = Caracteristica::findOrFail($id);
        if(request()->ajax()){
            $perif= $request->periferico;          
            $caracteristica->perifericos()->detach($perif);
            return response()->json(['success'=>'Eliminado.']);
        }
        $caracteristica->delete();
        returnresponse()->json(['success'=>'Eliminado.']);
    }

}
