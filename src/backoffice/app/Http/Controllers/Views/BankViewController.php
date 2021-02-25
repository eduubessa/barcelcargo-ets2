<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankViewController extends Controller
{
    //
    public function index(Request $request)
    {
        $banks = Bank::all();

        return response()->json($banks);
    }

    public function transfer(Request $request)
    {
        return view('bank.transfer');
    }
}
