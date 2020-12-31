<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterViewController extends Controller
{
    public function showForm(Request $request)
    {
        return view('auth.register');
    }
}
