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

// Rota Padrão

Route::get('/', function () {
    return view('home');
});

// Rotas de Autenticação

Route::get('/auth/login', function () {
    return view('auth/login');
})->name('login');

Route::post('/auth/login', function () {
    return redirect('/');
});

Route::get('/auth/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/auth/forgot', function () {
    return view('auth/forgot');
})->name('forgotpass');

Route::get('/auth/logout', function () {
    return redirect('/');
});

