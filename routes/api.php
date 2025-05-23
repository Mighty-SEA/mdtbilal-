<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScanQrController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/students/find-by-qr', [ScanQrController::class, 'findStudentByQr']);

Route::get('/scan-qr-siswa', function (Request $request) {
    $code = $request->query('qr');
    return app(\App\Http\Controllers\ScanQrController::class)->findStudentByQr(new Request(['code' => $code]));
}); 