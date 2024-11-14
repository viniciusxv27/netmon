<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NetworkTrafficController;
use App\Http\Controllers\AppController;

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

// Rotas de Dashboard

Route::fallback(function () {
    return redirect()->route('home');
});

Route::get('/', [AppController::class, 'index'])->middleware(['auth',])->name('home');

Route::get('/alerts', [AppController::class, 'alerts'])->middleware(['auth',])->name('alerts');

Route::get('/newConnection', [AppController::class, 'newConnection'])->middleware(['auth',])->name('newConnection');
Route::post('/newConnection', [AppController::class, 'createConnection'])->middleware(['auth',])->name('createConnection');

Route::get('/security', [AppController::class, 'security'])->middleware(['auth',])->name('security');

Route::get('/management', [AppController::class, 'management'])->middleware(['auth',])->name('management');

Route::get('/help', [AppController::class, 'help'])->middleware(['auth',])->name('help');

Route::get('/networkConfig', [AppController::class, 'networkConfig'])->middleware(['auth',])->name('networkConfig');
Route::post('configUpdate', [AppController::class, 'configUpdate'])->middleware(['auth',])->name('configUpdate');
Route::get('/configDelete/{id}', [AppController::class, 'configDelete'])->middleware(['auth',])->name('configDelete');

Route::get('/accountConfig', [AppController::class, 'accountConfig'])->middleware(['auth',])->name('accountConfig');
Route::post('/accountUpdate', [AppController::class, 'accountUpdate'])->middleware(['auth',])->name('accountUpdate');
Route::get('/accountDelete/{id}', [LoginController::class, 'accountDelete'])->middleware('auth')->name('accountDelete');


// End Point de Envio de Pacotes

Route::post('/send', [NetworkTrafficController::class, 'send'])->name('send');

// Rotas de Autenticação

Route::get('/auth/login', function () {
    return view('auth/login');
})->middleware('guest')->name('login');
Route::post('/auth/login', [LoginController::class, 'authenticate'])->middleware('guest');


Route::get('/auth/register', function () {
    return view('auth/register');
})->middleware('guest')->name('register');
Route::post('/auth/register', [LoginController::class, 'register'])->middleware('guest');


Route::get('/auth/forgot', function () {
    return view('auth/forgot');
})->middleware('guest')->name('forgotpass');
Route::post('/auth/forgot', [LoginController::class, 'forgot'])->middleware('guest')->name('forgotpass');


Route::get('/auth/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/auth/reset-password', [LoginController::class,'passwordReset'])->middleware('guest')->name('password.update');


Route::get('/auth/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');