<?php

use App\Http\Controllers\api\AuthApiController;
use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\LapanganController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/register', [AuthApiController::class, 'register']);

Route::get('/lapangan/cetak-laporan-pdf', [LapanganController::class, 'reportPdf'])->name('api.lapangans.cetak-pdf');
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('lapangans', LapanganController::class);
    Route::get('/dashboard/lapangan-summary', [DashboardController::class, 'lapanganSummary']);
    Route::get('/lapangans-list', [LapanganController::class, 'getData'])->name('api.lapangans.data');
    Route::post('/logout', [AuthApiController::class, 'logout']);
});