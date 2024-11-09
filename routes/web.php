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

// Rota Padrão

Route::get('/', [AppController::class, 'index'])->middleware(['auth',])->name('home');

Route::get('/alerts', [AppController::class, 'alerts'])->middleware(['auth',])->name('alerts');

Route::get('/newConnection', [AppController::class, 'newConnection'])->middleware(['auth',])->name('newConnection');

Route::get('/security', [AppController::class, 'security'])->middleware(['auth',])->name('security');

Route::get('/management', [AppController::class, 'management'])->middleware(['auth',])->name('management');

Route::get('/help', [AppController::class, 'help'])->middleware(['auth',])->name('help');

Route::get('/networkConfig', [AppController::class, 'networkConfig'])->middleware(['auth',])->name('networkConfig');

Route::get('/accountConfig', [AppController::class, 'accountConfig'])->middleware(['auth',])->name('accountConfig');

// End Point de Envio de Pacotes

Route::post('/send', [NetworkTrafficController::class, 'send'])->name('send');

// Rotas de Autenticação

Route::get('/auth/login', function () {
    return view('auth/login');
})->name('login');

Route::post('/auth/login', [LoginController::class,'authenticate']);


Route::get('/auth/register', function () {
    return view('auth/register');
})->name('register');

Route::post('/auth/register', [LoginController::class,'register']);


Route::get('/auth/forgot', function () {
    return view('auth/forgot');
})->name('forgotpass');

Route::post('/auth/forgot', [LoginController::class, 'forgot'])->name('forgotpass');


Route::get('/auth/logout', [LoginController::class,'logout'])->name('logout');

Route::fallback(function () {
    return redirect()->route('home'); // redireciona para outra rota
});