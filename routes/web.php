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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::get('/github', 'App\Http\Controllers\Register\RegisterAction');
// Route::get('/register/callback', 'App\Http\Controllers\Register\CallbackAction');

Route::prefix('auth')->middleware('guest')->group(function () {

    Route::get('/{provider}', 'App\Http\Controllers\Register\RegisterAction');
        // ->where('provider', 'google')
        // ->name('socialOAuth');

    Route::get('/{provider}/callback', 'App\Http\Controllers\Register\CallbackAction');
        // ->where('provider', 'google')
        // ->name('oauthCallback');
});
