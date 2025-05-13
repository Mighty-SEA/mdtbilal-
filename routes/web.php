<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');
