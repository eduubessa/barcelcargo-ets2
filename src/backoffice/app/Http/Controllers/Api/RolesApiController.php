<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesApiController extends Controller
{
    //
    public function index()
    {
        return response()->json(Role::with('permissions')->get());
    }
}
