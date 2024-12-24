<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Daftarpoli;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\Poli;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

class PendaftaranPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli = Poli::all(); // Ambil semua data poli
        $riwayatJanji = Dokter::all();
        return view('user.pages.daftar-poli.index', compact('poli', 'riwayatJanji'));
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
        $request->validate([
            'poli_id' => 'required|exists:poli,id',
            'dokter_id' => 'required|exists:dokter,id',
            'jadwal_id' => 'required|exists:jadwal_periksa,id',
            'keluhan' => 'required|string|max:255',
        ]);

        // Ambil ID jadwal yang dipilih
        $jadwalId = $request->input('jadwal_id');

        // Mencari nomor antrian yang tersedia berdasarkan jadwal tersebut
        $lastAntrian = Daftarpoli::where('jadwal_id', $jadwalId)
            ->orderBy('no_antrian', 'desc')
            ->first();

        // Menentukan nomor antrian berikutnya
        $nextAntrian = $lastAntrian ? $lastAntrian->no_antrian + 1 : 1;

        // Ambil ID Pasien dari pengguna yang sedang login
        $idPasien = Auth::user()->pasien->id;

        // **Cek apakah pasien memiliki antrian dengan status = 0**
        $existingAntrian = Daftarpoli::where('id_pasien', $idPasien)
            ->where('status_periksa', 0) // Status = 0 berarti masih menunggu pemeriksaan
            ->first();

        if ($existingAntrian) {
            // Jika pasien sudah memiliki antrian aktif, beri peringatan
            return redirect()->back()->with('error', 'Anda masih memiliki nomor antrian aktif dengan status belum selesai.');
        }

        // Cek apakah pasien sudah terdaftar untuk poli, dokter, dan jadwal yang sama
        $existingRecord = Daftarpoli::where('id_pasien', $idPasien)
            ->where('poli_id', $request->poli_id)
            ->where('dokter_id', $request->dokter_id)
            ->where('jadwal_id', $jadwalId)
            ->where('status_periksa', 0)
            ->first();

        if ($existingRecord) {
            // Jika pasien sudah terdaftar untuk jadwal yang sama
            return redirect()->back()->with('error', 'Anda sudah terdaftar pada jadwal yang sama.');
        }

        // Jika validasi lolos, buat nomor antrian baru
        Daftarpoli::create([
            'id_pasien' => $idPasien,
            'poli_id' => $request->poli_id,
            'dokter_id' => $request->dokter_id,
            'jadwal_id' => $request->jadwal_id,
            'keluhan' => $request->input('keluhan'),
            'no_antrian' => $nextAntrian,
            'status_periksa' => 0, // Status baru dibuat, otomatis menjadi 0 (belum diperiksa)
        ]);

        // Redirect dengan informasi nomor antrian yang berhasil dibuat
        return redirect()->back()->with('success', 'Pendaftaran berhasil! Nomor antrian Anda: ' . $nextAntrian);
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
