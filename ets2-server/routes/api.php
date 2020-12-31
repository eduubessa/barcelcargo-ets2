<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', [\App\Http\Controllers\Api\UsersApiController::class, 'index']);
Route::post('/user/{username}', [\App\Http\Controllers\Api\UsersApiController::class, 'show']);
Route::get('/roles', [\App\Http\Controllers\Api\RolesApiController::class, 'index']);


Route::post('/bank/transfer/', [\App\Http\Controllers\Api\BankApiController::class, 'transfer'])->name('api.bank.transfer');
