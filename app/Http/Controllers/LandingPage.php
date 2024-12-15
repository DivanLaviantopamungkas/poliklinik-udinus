<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poli;

class LandingPage extends Controller
{
    public function index()
    {
        $dataDokter = Dokter::count();
        $dataPoli = Poli::count();
        $dataPasien = Pasien::count();
        return view('landingpage', compact('dataDokter', 'dataPoli', 'dataPasien'));
    }
}
