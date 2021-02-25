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
    Route::get('/banks', [App\Http\Controllers\Views\BankViewController::class, 'index'])->name('views.banks');
    Route::get('/bank/transfer', [App\Http\Controllers\Views\BankViewController::class, 'transfer'])->name('views.bank.transfer');
    //Cargos

    // Events
    Route::get('/events', [App\Http\Controllers\Views\EventsViewController::class, 'index'])->name('views.events');
    Route::get('/events/create', [App\Http\Controllers\Views\EventsViewController::class, 'create'])->name('views.event.create');
    Route::get('/event/{slug}', [App\Http\Controllers\Views\EventsViewController::class, 'show'])->name('views.event.show');

    // Access Tokens
    Route::get('/access-tokens', [App\Http\Controllers\Views\AccessTokensViewController::class, 'index'])->name('views.access_tokens');
    Route::get('/access-tokens/create', [App\Http\Controllers\Views\AccessTokensViewController::class, 'create'])->name('views.access_tokens.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
