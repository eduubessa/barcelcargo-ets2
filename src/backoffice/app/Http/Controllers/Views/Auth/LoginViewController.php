<?php

namespace App\Http\Controllers\Views\Auth;

use App\Models\User;
use App\Utils\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use App\Http\Requests\Auth\LoginRequest;
use Monolog\Utils;

class LoginViewController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }
}
