<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyUserRequest;
use App\Http\Requests\Admin\StoreUsersRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Role;
use App\User;
use App\Area;

class UsersController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('user_access'), 403);//Comparar si tiene permisos
        $users = User::all();
         $notificacion = '';
        return view('admin.users.index', compact('users','notificacion' ));
    }

     public function show(User $user){
        abort_unless(\Gate::allows('user_show'), 403);
        return view('admin.users.show', compact('user'));
    }

    public function create(){
        $roles = Role::all()->pluck('title', 'id');
        $areas = Area::all();
        $enumoption = General::getEnumValues('users','sexo');       
        abort_unless(\Gate::allows('user_create'), 403);
        return view('admin.users.create', compact('roles', 'enumoption', 'areas'));
    }

    public function store(Request $request){    
       abort_unless(\Gate::allows('user_create'), 403);
        $email=$request->email;
        $request["email"]= $email."@unexpo.com";
        $validator = Validator::make($request->all(), [
            'email' => 'email|required|unique:users,email',
            'password' => 'required',
            'role.*' => 'integer|exists:roles,id|required',
            'remember_token' => 'nullable',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'cedula' => 'required|unique:users,cedula',
            'telefono' => 'integer|nullable',
            'sexo' => 'required',
            'area_id' => 'required|exists:areas,id',

        ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.users.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->load('roles');
        $users = User::all();
        $notificacion = 'Tecnico agregado con exito.';
        return view('admin.users.index', compact('users', 'notificacion'));
    }

    public function edit(User $user){

        $roles = Role::all()->pluck('title', 'id');
        $areas = Area::all();
        $enumoption = General::getEnumValues('users','sexo');
        $email= explode("@",$user->email);
        $user->load('roles');
        abort_unless(\Gate::allows('user_edit'), 403);      
        return view('admin.users.edit', compact('roles','enumoption', 'areas', 'user', 'email'));
    }

    public function update(Request $request, User $user){

        abort_unless(\Gate::allows('user_edit'), 403);
        $email=$request->email;
        $request["email"]= $email."@unexpo.com";
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'cedula' => 'required|unique:users,cedula,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => '',
            'role.*' => 'integer|exists:roles,id|mrequired',
            'remember_token' => 'nullable',
            'telefono' => 'integer|nullable',
            'sexo' => 'required',
            'area_id' => 'required|exists:areas,id',

        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.users.edit', $user)
                        ->withErrors($validator)
                        ->withInput();
            }
      
         User::findOrFail($user->id)->update($request->all());
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->load('roles');
               
        $users = User::all();
          $notificacion = 'Tecnico Actualizado con exito.';
        return view('admin.users.index', compact('users', 'notificacion'));

    }

   

    public function destroy(User $user){
        abort_unless(\Gate::allows('user_delete'), 403);
        $user->delete();       
        $users = User::all();
          $notificacion = 'Tecnico Eliminado con exito.';
        return view('admin.users.index', compact('users', 'notificacion'));
    }

    public function massDestroy(MassDestroyUserRequest $request){
        User::whereIn('id', request('ids'))->delete();
        $users = User::all();
          $notificacion = 'Tecnicos Eliminados con exito.';
        return view('admin.users.index', compact('users', 'notificacion'));
    }
}
