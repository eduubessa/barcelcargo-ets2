<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Utils\Constants\UserInterface;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{
    protected $redirectTo = '/home';

    public function authenticate(LoginPostRequest $request)
    {
        $validation = $request->validated();

        if(!$validation)
        {
            return back()->withErrors($validation);
        }

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'status' => UserInterface::BARCEL_USER_STATUS_ENABLED
            ];

        if(!Auth::attempt($credentials, $request->input('remember'))) {
            return redirect()->to($this->redirectTo);
        }

        $request->session()->regenerate();

        return redirect()->to($this->redirectTo);
    }
}
