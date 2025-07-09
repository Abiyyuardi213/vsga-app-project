<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\RestoranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard.admin');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::resource('restoran', RestoranController::class);
Route::resource('makanan', MakananController::class);
