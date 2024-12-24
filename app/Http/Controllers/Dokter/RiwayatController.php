<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DetailPeriksa;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $riwayat = Periksa::with(['daftarPoli.pasien', 'daftarPoli.dokter']) // Menambahkan eager loading untuk pasien
            ->whereHas('daftarPoli', function ($query) use ($user) {
                $query->where('dokter_id', $user->dokter->id);
            })
            ->orderBy('tgl_periksa', 'desc')
            ->get();

        return view('dokter.pages.detail-periksa.index', compact('riwayat'));
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
        $riwayat = Periksa::with(['daftarPoli.pasien', 'detailPeriksa.obat'])->find($id);

        if ($riwayat) {
            return response()->json(['data' => $riwayat]);
        }

        return response()->json(['message' => 'Detail tidak ditemukan'], 404);
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
