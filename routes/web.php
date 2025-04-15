<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('layouts.main');
});
Route::get('/dokter', function () {
    return view('layouts.list_dokter');
});
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
