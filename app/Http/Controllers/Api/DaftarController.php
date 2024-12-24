<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailPeriksa;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Periksa;
use App\Models\Poli;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getDokterByPoli($poli_id)
    {
        // Validasi input
        if (!is_numeric($poli_id)) {
            return response()->json(['error' => 'Poli ID harus berupa angka'], 400);
        }

        // Log::info('Menerima request untuk poli ID: ' . $poli_id);

        // Query dokter berdasarkan poli_id
        $dokters = Dokter::where('id_poli', $poli_id)->get();

        // Log::info('Dokter ditemukan: ', $dokters->toArray());

        // Return dalam format JSON
        return response()->json($dokters);
    }

    // Mengambil jadwal berdasarkan dokter
    public function getJadwalDokter($dokter_id)
    {
        // Query jadwal berdasarkan dokter_id
        $jadwals = JadwalPeriksa::where('id_dokter', $dokter_id)
            ->where('aktif', 1)
            ->get();

        // Return dalam format JSON
        return response()->json($jadwals);
    }

    // Method untuk API untuk detail pemeriksaan
    public function detailRiwayatApi($idPeriksa)
    {
        // Ambil data detail pemeriksaan dengan relasi
        $detailPeriksa = DetailPeriksa::with(['periksa.daftarpoli.pasien', 'obat'])
            ->where('id_periksa', $idPeriksa)
            ->get();

        // Jika data tidak ditemukan
        if ($detailPeriksa->isEmpty()) {
            return response()->json(['message' => 'Detail pemeriksaan tidak ditemukan'], 404);
        }

        // Mapping data untuk response
        $data = $detailPeriksa->map(function ($item) {
            return [
                'id_detail_periksa' => $item->id,
                'nama_pasien' => optional($item->periksa->daftarpoli->pasien)->nama ?? 'Tidak Diketahui',
                'id_obat' => $item->id_obat,
                'nama_obat' => optional($item->obat)->nama_obat ?? 'Tidak Diketahui',
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        return response()->json([
            'message' => 'Detail pemeriksaan ditemukan',
            'data' => $data,
        ], 200);
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
