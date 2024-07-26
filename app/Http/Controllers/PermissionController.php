<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function update(Request $request) {
        $id= $request->id;
        $permissions = json_decode($request->permissions,true);

        $rol = Role::find($id);
        $rol->syncPermissions($permissions);
    }
}
