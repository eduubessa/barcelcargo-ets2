<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UsersViewController extends Controller
{
    public function index(Request $request)
    {
        if(is_null($request->query('rows'))){
            $limit = 50;
        }else{
            $limit = $request->query('rows');
        }

        $users = User::paginate($limit);

        return view('pages.users.index')->with([
            "users" => $users
        ]);
    }

    //
    public function show(Request $request, $username)
    {
        $profile = User::where('username', $username)->firstOrFail();
        return response()->json($profile);
    }

    public function create(Request $request)
    {
        return view('pages.users.create');
    }

    public function edit(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('pages.users.edit')
            ->withUser($user);
    }
}
