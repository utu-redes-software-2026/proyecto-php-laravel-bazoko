<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mediciones', MedicionController::class);