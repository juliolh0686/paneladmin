<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $buscar= $request->buscar;
        $criterio = $request->criterio;

        $user = User::with(['roles:id,name'])->where($criterio,'like','%'.$buscar.'%')
        ->paginate(10);

        return Inertia::render('Users/Users', [
           'pagination' =>[
                'total'         => $user->total(),
                'current_page'  => $user->currentPage(),
                'per_page'      => $user->perpage(),
                'last_page'     => $user->lastPage(),
                'from'          => $user->firstItem(),
                'to'            => $user->lastItem(),
            ],
            'user' => $user
        ]);
    }
}
