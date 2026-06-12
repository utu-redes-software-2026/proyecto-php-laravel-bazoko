<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\MedicionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/mediciones', [MedicionController::class, 'index'])->name('mediciones.index');
    Route::get('/mediciones/create', [MedicionController::class, 'create'])
        ->middleware('role:admin,carga')
        ->name('mediciones.create');
    Route::post('/mediciones', [MedicionController::class, 'store'])
        ->middleware('role:admin,carga')
        ->name('mediciones.store');

    Route::get('/inspecciones', [InspeccionController::class, 'index'])->name('inspecciones.index');
    Route::get('/inspecciones/create', [InspeccionController::class, 'create'])
        ->middleware('role:admin,carga')
        ->name('inspecciones.create');
    Route::post('/inspecciones', [InspeccionController::class, 'store'])
        ->middleware('role:admin,carga')
        ->name('inspecciones.store');
});
