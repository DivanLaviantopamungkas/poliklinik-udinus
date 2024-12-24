<?php

use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\DaftarPoli;
use App\Http\Controllers\Api\DaftarController;
use App\Http\Controllers\Api\DaftarPoliController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API route works!']);
});

Route::get('/dokter-by-poli/{poliId}', [DaftarController::class, 'getDokterByPoli']);
Route::get('/jadwal-by-dokter/{dokterId}', [DaftarController::class, 'getJadwalDokter']);
Route::get('/dokter/riwayat/detail/{id}', [DaftarController::class, 'detailRiwayatApi']);
