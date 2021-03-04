<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Cargo;
use App\Models\Role;
use App\Models\User;
use App\Utils\Constants\RoleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function store(StoreUserRequest $request)
    {
        //Fetch default role
        $role = Role::where('slug', str_replace("bc_role_", "",RoleInterface::BARCEL_ROLE_DRIVER))->firstOrFail();

        // Create user
        $user = new User();
        $user->role_id = $role->id;
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->birthday = date("y-m-d");
        $user->ip_address = "127.0.0.1";
        $user->save();

        //Send create register email

        return redirect()->route('views.users');
    }

}
