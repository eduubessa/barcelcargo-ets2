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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.home');

    //User
    Route::get('/users', [\App\Http\Controllers\Views\UsersViewController::class, 'index'])->name('users.index');
    Route::get('/users/create', [\App\Http\Controllers\Views\UsersViewController::class, 'create'])->name('users.create');
    Route::get('/users/resume/{username}', [\App\Http\Controllers\Api\UsersApiController::class, 'resume'])->name('users.resume');
    Route::get('/profile/{username}', [\App\Http\Controllers\Views\UsersViewController::class, 'show'])->name('profile.show');
    //Bank
    Route::get('/banks', [App\Http\Controllers\Views\BankController::class, 'index'])->name('views.banks');
    Route::get('/bank/transfer', [App\Http\Controllers\Views\BankController::class, 'transfer'])->name('views.bank.transfer');
    //Cargos
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
