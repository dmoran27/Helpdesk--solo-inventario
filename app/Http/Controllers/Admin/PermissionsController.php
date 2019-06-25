<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyPermissionRequest;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;
use App\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('permission_access'), 403);
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

}
