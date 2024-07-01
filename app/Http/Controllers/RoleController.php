<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{

    public function update(Request $request) {
        $id= $request->id;
        $roles = json_decode($request->roles, true);

        $user = User::find($id);
        $user->syncRoles($roles);
    }
}
