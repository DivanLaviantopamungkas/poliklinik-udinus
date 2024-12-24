<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPeriksa;
use App\Models\Daftarpoli;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use Illuminate\Http\Request;

class HomeDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasienPerluDiperiksa = Daftarpoli::where('status_periksa', 0)->count();

        $jadwalAktif = JadwalPeriksa::where('aktif', 1)->count();

        return view('dokter.pages.home.index', [
            'pasienPerluDiperiksa' => $pasienPerluDiperiksa,
            'jadwalAktif' => $jadwalAktif,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
