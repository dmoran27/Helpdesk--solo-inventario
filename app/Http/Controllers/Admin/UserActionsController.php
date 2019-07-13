<?php

namespace App\Http\Controllers\Admin;

use App\UserAction;
use App\Http\Resources\UserAction as UserActionResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserActionsController extends Controller
{

    /**
     * Display a listing of UserAction.
     *
     * @return UserActionResource
     */
    public function index()
    {
        abort_unless(\Gate::allows('user_action_access'), 403);//Comparar si tiene permisos
        $acciones = UserAction::all();
        $consulta = [];
        foreach ($acciones as $action) {
        	$tabla=$action->action_model;
        	$consulta[] = DB::table($tabla)->where('id', '=', $action->action_id)->first();
	        
        		
        }
        return view('admin.useraction.index', compact('acciones','consulta' ));
    }
}
