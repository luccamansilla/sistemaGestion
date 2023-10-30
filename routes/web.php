<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DominioController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
