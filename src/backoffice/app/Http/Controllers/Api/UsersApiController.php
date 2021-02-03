<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
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
            ->withCount('cargosOnFirstMonth')
            ->withCount('cargosOnSecondMonth')
            ->withCount('cargosOnThirdMonth')
            ->withSum('allCargo', 'distance_come')
            ->withSum('allCargo', 'income')
            ->where('username', $username)
            ->firstOrFail();

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validation = $this->validate($request, [
            //
            'name' => 'required|string|min:3|max:50',
            'username' => 'required|string|min:3|max:30|unique:users',
            'email' => 'required|email|min:3|max:100|unique:users',
            'password' => 'required|string|min:5|max:100|confirmed'
        ]);

        if($validation)
        {
            return response()->json($validation->errors());
        }

        return "hello";
    }

}
