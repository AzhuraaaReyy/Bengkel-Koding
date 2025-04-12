<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});
Route::get('/dokter', function () {
    return view('layouts.list_dokter');
});
Route::get('/obat', function () {
    return view('layouts.list_obat');
});
Route::get('/pemeriksaan', function () {
    return view('layouts.list_obat');
});
