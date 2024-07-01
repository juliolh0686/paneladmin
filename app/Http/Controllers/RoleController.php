<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{
    public function updateRoles(Request $request)
    {
        $id= $request->id;
        $roles = $request->roles;

        $user = User::find($id);
        $user->syncRoles($roles);
    }

    public function update(Request $request) {
        $id= $request->id;
        $roles = $request->roles;

        $user = User::find($id);
        $user->syncRoles($roles);
    }
}
