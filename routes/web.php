<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/success/{registration_number}', [PpdbController::class, 'success'])->name('ppdb.success');
