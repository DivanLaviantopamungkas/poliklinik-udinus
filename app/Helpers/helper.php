<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('getPageTitle')) {
    function getPageTitle()
    {
        switch (Route::currentRouteName()) {
            case 'admin.dashboard':
                return 'Dashboard';
            case 'data.pasien';
                return 'Data Pasien';
            case 'poliklinik':
                return 'Poliklinik';
            case 'data.obat':
                return 'Data Obat';
            case 'data.dokter':
                return 'Data Dokter';
            default:
                return 'Halaman Tidak Dikenal';
        }
    }
}
