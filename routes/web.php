<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DominioController;
use App\Http\Controllers\HistorialDominioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::controller(DominioController::class)->group(function () {
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('dominios/show', 'show')->name('dominio.show');
        Route::get('dominios/create', 'create')->name('dominio.create');
        Route::post('dominios/store', 'store')->name('dominio.store');
        Route::get('dominios/edit/{idDominio}', 'edit')->name('dominio.edit');
        Route::post('dominios/update/{dominio}', 'update')->name('dominio.update');
    });
});

Route::controller(ClienteController::class)->group(function () {
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('cliente/show', 'show')->name('cliente.show');
        Route::get('cliente/create', 'create')->name('cliente.create');
        Route::post('cliente/store', 'store')->name('cliente.store');
        Route::get('cliente/edit/{idCliente}', 'edit')->name('cliente.edit');
    });
});

Route::controller(ContactoController::class)->group(function () {
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::post('contacto/update', 'update')->name('contacto.update');
    });
});


Route::controller(Controller::class)->group(function () {
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
});

Route::get('/logout', function () {
    Auth::logout();
    return view('welcome');; // Cambia '/' por la ruta a la que deseas redireccionar después del logout
})->name('cerrarSesion');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
