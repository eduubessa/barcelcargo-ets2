<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargosApiController extends Controller
{
    //
    public function index()
    {
        $cargos = Cargo::with('driver')->paginate(50);

        return response()->json($cargos);
    }

    public function store(Request $request)
    {

    }
}
