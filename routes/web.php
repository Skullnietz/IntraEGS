<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\OrdenesController;

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
Route::get('/clientes', [clientesController::class, 'indexClientes']);
//Registro de cliente
Route::get('/createCliente', [clientesController::class, 'createClientes']);
//Modificar cliente

Route::get('clientes/get', [clientesController::class,'getClientes'])->name('clientes.get');
Route::get('ordenes/get', [OrdenesController::class,'getOrdenes'])->name('orden.get');


//Borrar cliente

Route::get('/ordenes', [App\Http\Controllers\OrdenesController::class, 'index'])->name('ordenes');
Route::get('/orden/{id}', [App\Http\Controllers\OrdenesController::class, 'show'])->name('show-orden');
Route::get('/json/ordenes', [App\Http\Controllers\OrdenesController::class, 'jsonOrdenes'])->name('jsonordenes');
Route::get('/json/clientes', [App\Http\Controllers\OrdenesController::class, 'jsonClientes'])->name('jsonclientes');



Route::get('/verify', function () {
    return view('auth.verify');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/dashboard', function () {
    return view('dash');
});



