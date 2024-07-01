<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $buscar= $request->buscar;
        $criterio = $request->criterio;

        $users =UserResource::collection(User::with(['roles:id,name'])->where($criterio,'like','%'.$buscar.'%')->paginate(2));

        $roles = Role::select('id','name')->get();

        return Inertia::render('Users/Users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
