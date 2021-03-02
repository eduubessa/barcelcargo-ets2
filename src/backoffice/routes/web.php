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
    Route::get('/users', [\App\Http\Controllers\Views\UsersViewController::class, 'index'])->name('views.users');
    Route::get('/users/create', [\App\Http\Controllers\Views\UsersViewController::class, 'create'])->name('views.user.create');
    Route::post('/users/', [\App\Http\Controllers\Api\UsersApiController::class, 'store'])->name('views.users.store');
    Route::get('/users/resume/{username}', [\App\Http\Controllers\Api\UsersApiController::class, 'resume'])->name('users.resume');
    Route::get('/profile/{username}', [\App\Http\Controllers\Views\UsersViewController::class, 'show'])->name('profile.show');

    //Bank
    Route::get('/banks', [App\Http\Controllers\Views\BankViewController::class, 'index'])->name('views.banks');
    Route::get('/bank/transfer', [App\Http\Controllers\Views\BankViewController::class, 'transfer'])->name('views.bank.transfer');
    //Cargos

    // Events
    Route::get('/events', [App\Http\Controllers\Views\EventsViewController::class, 'index'])->name('views.events');
    Route::post('/events', [App\Http\Controllers\Api\EventsApiController::class, 'store'])->name('views.events.store');
    Route::get('/events/create', [App\Http\Controllers\Views\EventsViewController::class, 'create'])->name('views.event.create');
    Route::get('/event/{slug}', [App\Http\Controllers\Views\EventsViewController::class, 'show'])->name('views.event.show');
    Route::get('/event/{slug}/edit', [App\Http\Controllers\Views\EventsViewController::class, 'edit'])->name('views.event.edit');
    Route::post('/event/{slug}/update', [App\Http\Controllers\Api\EventsApiController::class, 'update'])->name('views.event.update');
    Route::get('/event/{slug}/delete', [App\Http\Controllers\Api\EventsApiController::class, 'drop'])->name('views.event.delete');
    // Access Tokens
    Route::get('/access-tokens', [App\Http\Controllers\Views\AccessTokensViewController::class, 'index'])->name('views.access_tokens');
    Route::get('/access-tokens/create', [App\Http\Controllers\Views\AccessTokensViewController::class, 'create'])->name('views.access_tokens.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
