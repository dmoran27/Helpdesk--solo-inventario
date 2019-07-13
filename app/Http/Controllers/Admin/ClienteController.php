<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyClienteRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Cliente;
use App\Dependencia;

class ClienteController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('cliente_access'), 403);//Comparar si tiene permisos
        $clientes = Cliente::all();
         $notificacion = '';
        return view('admin.clientes.index', compact('clientes','notificacion' ));
    }

     public function show(Cliente $cliente){
        abort_unless(\Gate::allows('cliente_show'), 403);
        return view('admin.clientes.show', compact('cliente'));
    }

    public function create(){

        abort_unless(\Gate::allows('cliente_create'), 403);

        $dependencias = Dependencia::all();
        $enumoption = General::getEnumValues('clientes','sexo');
        $enumoption2 = General::getEnumValues('clientes','tipo');
        
        return view('admin.clientes.create', compact('enumoption', 'enumoption2', 'dependencias'));
    }

    public function store(Request $request){
        abort_unless(\Gate::allows('cliente_create'), 403);
        $request["user_id"]=auth()->user()->id;
        $email=$request->email;
        $request["email"]= $email."@unexpo.edu.ve";
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|integer|unique:clientes,cedula',
            'telefono' => 'integer|nullable',
            'sexo' => 'required',
            'tipo' => 'required',
            'dependencia_id' => 'required',
            'email' => 'string|email|unique:clientes,email',
            'user_id'=> 'required',
        ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.clientes.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $cliente = Cliente::create($request->all());

         if(request()->ajax()){

              return response()->json($cliente->id);
         }

        $clientes = Cliente::all();
        $notificacion = 'Usuario agregado con exito.';
        return view('admin.clientes.index', compact('clientes', 'notificacion'));
    }

    public function edit(Cliente $cliente){
        $dependencias = Dependencia::all();
        $enumoption2 = General::getEnumValues('clientes','tipo');
        $enumoption = General::getEnumValues('clientes','sexo');
        $email= explode("@",$cliente->email);
        abort_unless(\Gate::allows('cliente_edit'), 403);      
        return view('admin.clientes.edit', compact('enumoption','enumoption2', 'dependencias', 'cliente', 'email'));
    }

    public function update(Request $request, Cliente $cliente){
        abort_unless(\Gate::allows('cliente_edit'), 403); 
         $request["user_id"]=auth()->user()->id;
          $email=$request->email;
        $request["email"]= $email."@unexpo.edu.ve";
        $validator = Validator::make($request->all(), [
           'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|integer|unique:clientes,cedula,'.$cliente->id,
            'telefono' => 'integer|nullable',
            'sexo' => 'required|string|max:10',
            'tipo' => 'required|string|max:20',
            'dependencia_id' => 'required|string|max:255',
            'email' => 'string|email|unique:clientes,email,'.$cliente->id,
            'user_id'=> 'required',
        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.clientes.edit', $cliente)
                        ->withErrors($validator)
                        ->withInput();
            }  
        
        $cliente->update($request->all());
        $clientes = Cliente::all();
       $notificacion = 'Usuario actualizado con exito.';
return view('admin.clientes.index', compact('clientes', 'notificacion'
        ));
    }

   

    public function destroy(Cliente $cliente){
        abort_unless(\Gate::allows('cliente_delete'), 403);
        $cliente->delete();       
        $clientes = Cliente::all();
       $notificacion = 'Usuario Eliminado con exito.';
        return view('admin.clientes.index', compact('clientes', 'notificacion'));
    }

    public function massDestroy(MassDestroyClienteRequest $request){
        Cliente::whereIn('id', request('ids'))->delete();
         $clientes = Cliente::all();
         $notificacion = 'Usuarios Eliminados con exito.';
        return view('admin.clientes.index', compact('clientes', 'notificacion'));
    }
}
