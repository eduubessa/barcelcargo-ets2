<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Views authentication

//Auth routes
Route::get('/auth/login/{next?}', [\App\Http\Controllers\Views\Auth\LoginViewController::class, 'showForm'])->name('views.auth.login');
Route::post('/auth/login', [\App\Http\Controllers\Api\Auth\LoginApiController::class, 'login'])->name('api.auth.login.post');
Route::get('/auth/register', [\App\Http\Controllers\Views\Auth\RegisterViewController::class, 'showForm'])->name('views.auth.register');
Route::post('/auth/register', [\App\Http\Controllers\Api\Auth\RegisterApiController::class, 'register'])->name('api.auth.register');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/banks', [App\Http\Controllers\Views\BankController::class, 'index'])->name('views.banks');
Route::get('/bank/transfer', [App\Http\Controllers\Views\BankController::class, 'transfer'])->name('views.bank.transfer');
