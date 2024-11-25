<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AutenticaController;
use App\Http\Controllers\PedidoController;

Route::view('/','inicio')->name('home');

Route::get('/dashboard', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/productos', ProductoController::class)->middleware('auth');
Route::resource('/categorias',CategoriaController::class)->middleware('auth');
Route::resource('/productos',ProductoController::class)->middleware('auth');
Route::resource('/pedidos', PedidoController::class)->middleware('auth');
Route::get('/pedidos/create/{producto}', [PedidoController::class, 'create'])->name('pedidos.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
