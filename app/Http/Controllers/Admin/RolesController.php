<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MassDestroyRoleRequest;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use App\Permission;
use App\Role;

class RolesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('role_access'), 403);

        $roles = Role::all();
        $notificacion = '';
        return view('admin.roles.index', compact('roles','notificacion' ));
    }

    public function create()
    {
        abort_unless(\Gate::allows('role_create'), 403);
        $permissions = Permission::all()->pluck('nombre', 'id');
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        abort_unless(\Gate::allows('role_create'), 403);
        
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        $roles = Role::all();
        $notificacion = 'Rol agregado con exito.';
        return view('admin.roles.index', compact('roles', 'notificacion'));
    }

    public function edit(Role $role)
    {
        abort_unless(\Gate::allows('role_edit'), 403);
        $permissions = Permission::all()->pluck('nombre', 'id');
        $role->load('permissions');
        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        abort_unless(\Gate::allows('role_edit'), 403);
       
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        $roles = Role::all();
        $notificacion = 'Rol agregado con exito.';
        return view('admin.roles.index', compact('roles', 'notificacion'));
    }

    public function show(Role $role)
    {
        abort_unless(\Gate::allows('role_show'), 403);

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        abort_unless(\Gate::allows('role_delete'), 403);

        $role->delete();
        $roles = Role::all();
        $notificacion = 'Rol Eliminado con exito.';
        return view('admin.roles.index', compact('roles', 'notificacion'));
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();
        $roles = Role::all();
         $notificacion = 'Roles Eliminados con exito.';
        return view('admin.roles.index', compact('roles', 'notificacion'));
    }
}
