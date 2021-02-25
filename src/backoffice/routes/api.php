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

Route::middleware('throttle:api')->get('/users', [\App\Http\Controllers\Api\UsersApiController::class, 'index']);

Route::get('/user/{username}', [\App\Http\Controllers\Api\UsersApiController::class, 'show']);
Route::get('/user/{username}/resume', [\App\Http\Controllers\Api\UsersApiController::class, 'resume']);
Route::get('/roles', [\App\Http\Controllers\Api\RolesApiController::class, 'index']);

Route::post('/bank/transfer/', [\App\Http\Controllers\Api\BankApiController::class, 'transfer'])->name('api.bank.transfer');


// Users
Route::post('/users/', [\App\Http\Controllers\Api\UsersApiController::class, 'store'])->name('api.users.store');
Route::patch('/users/', [\App\Http\Controllers\Api\UsersApiController::class, 'update'])->name('api.users.update');

// Events
Route::get('/events', [\App\Http\Controllers\Api\EventsApiController::class, 'index'])->name('api.events');
Route::post('/events', [\App\Http\Controllers\Api\EventsApiController::class, 'store'])->name('api.event.store');

// Cargos
Route::get('/cargos', [\App\Http\Controllers\API\CargosApiController::class, 'index'])->name('api.cargos');

// Servers
Route::get('/servers', [\App\Http\Controllers\Api\ServersApiController::class, 'index'])->name('api.servers');
