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
Route::get('/user/{username}', [\App\Http\Controllers\Api\UsersApiController::class, 'show']);
Route::get('/user/{username}/resume', [\App\Http\Controllers\Api\UsersApiController::class, 'resume']);
Route::get('/roles', [\App\Http\Controllers\Api\RolesApiController::class, 'index']);

Route::post('/bank/transfer/', [\App\Http\Controllers\Api\BankApiController::class, 'transfer'])->name('api.bank.transfer');

// Temporary
Route::get('bank/{iban}', [\App\Http\Controllers\Api\BankApiController::class, 'show'])->name('api.bank.show');

// Events
Route::get('/events', [\App\Http\Controllers\Api\EventsApiController::class, 'index'])->name('api.events');
