<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ClientesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas de clientes
//Lista de clientes
Route::get('/clientes', [RegisterController::class, 'indexClientes']);
//Registro de cliente
Route::get('/createCliente', [RegisterController::class, 'createClientes']);
//Modificar cliente

//Borrar cliente



Route::get('/verify', function () {
    return view('auth.verify');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/dashboard', function () {
    return view('dash');
});

Route::get('/ordenes', function () {
    return view('ordenes.ordenes');
});
Route::get('/clientes', function () {
    return view('ordenes.ordenes');
});
