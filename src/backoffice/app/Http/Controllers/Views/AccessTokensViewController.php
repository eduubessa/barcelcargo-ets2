<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\AccessToken;
use Illuminate\Http\Request;

class AccessTokensViewController extends Controller
{
    //
    public function index(Request $request)
    {
        $access_tokens = AccessToken::with('user')->get();

        return view('pages.access-tokens.index')
            ->with(['access_tokens' => $access_tokens]);
    }

    public function create(Request $request)
    {
        return view('pages.access-tokens.create');
    }
}
