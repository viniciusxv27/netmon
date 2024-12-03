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
Route::get('/setDefault/{id}', [AppController::class, 'setDefault'])->middleware(['auth',])->name('setDefault');

Route::get('/help', [AppController::class, 'help'])->middleware(['auth',])->name('help');

Route::get('/viewPacket/{id}', [AppController::class, 'viewPacket'])->middleware(['auth',])->name('packetView');
Route::get('/deletePacket/{id}', [AppController::class, 'deletePacket'])->middleware(['auth',])->name('packetDelete');
Route::get('/dangerPacket/{id}', [AppController::class, 'dangerPacket'])->middleware(['auth',])->name('packetDanger');
Route::get('/getPackets', [AppController::class,'getPackets'])->middleware(['auth',])->name('getPackets');

Route::get('/networkConfig', [AppController::class, 'networkConfig'])->middleware(['auth',])->name('networkConfig');
Route::post('networkUpdate', [AppController::class, 'networkUpdate'])->middleware(['auth',])->name('networkUpdate');
Route::get('/networkDelete/{id}', [AppController::class, 'networkDelete'])->middleware(['auth',])->name('networkDelete');

// Rotas de Configuração (API)
Route::get('/getNetwork/{id}', [AppController::class, 'networkConfigEdit'])->middleware(['auth',])->name('networkConfigEdit');
Route::get('/getConnections/{id}', [AppController::class, 'connectionConfigEdit'])->middleware(['auth',])->name('connectionConfigEdit');

Route::get('/accountConfig', [AppController::class, 'accountConfig'])->middleware(['auth',])->name('accountConfig');
Route::post('/accountUpdate', [AppController::class, 'accountUpdate'])->middleware(['auth',])->name('accountUpdate');
Route::get('/accountDelete', [AppController::class, 'accountDelete'])->middleware('auth')->name('accountDelete');


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