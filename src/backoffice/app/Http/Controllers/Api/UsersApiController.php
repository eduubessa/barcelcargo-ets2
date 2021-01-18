<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with(['bank', 'role'])->get();

        return response()->json($users);
    }

    public function resume(Request $request, $username)
    {
        // Informação sobre o utilizador
        $user = User::with(['role', 'bank', 'cargo'])
            ->withCount('allCargo')
            ->withSum('allCargo', 'distance_come')
            ->withSum('allCargo', 'income')
            ->where('username', $username)
            ->firstOrFail();

        return response()->json($user);
    }
}
