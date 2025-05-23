<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::post('/ppdb', [PpdbController::class, 'store'])
    ->middleware('throttle:2,1')
    ->name('ppdb.store');
Route::get('/ppdb/success/{registration_number}', [PpdbController::class, 'success'])->name('ppdb.success');

Route::get('/test', function () {
    return view('test');
});
