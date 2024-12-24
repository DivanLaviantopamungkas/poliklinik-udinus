<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Daftarpoli;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $daftarPoli = Daftarpoli::with('pasien', 'jadwal', 'periksa')
            ->where('dokter_id', $user->dokter->id)
            ->get();

        return view('dokter.pages.data-periksa.index', compact('daftarPoli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $daftarPoli = Daftarpoli::with('pasien')->findorFail($id);
        $obatList = Obat::all();
        return view('dokter.pages.data-periksa.create', compact('daftarPoli', 'obatList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Memulai proses store');

        // Validasi data
        $request->validate([
            'id_daftar_poli' => 'required|exists:daftar_poli,id',
            'catatan' => 'required',
            'biaya_dokter' => 'required|numeric',
            'obat' => 'required|array',
        ]);

        // Menghitung total biaya obat
        $biayaObat = Obat::whereIn('id', $request->obat)->sum('harga');
        $totalBiaya = $biayaObat + $request->biaya_dokter;

        // Mulai transaksi untuk menjaga konsistensi data
        DB::beginTransaction();

        try {
            // Menyimpan data pemeriksaan
            $periksa = Periksa::create([
                'id_daftar_poli' => $request->id_daftar_poli,
                'tgl_periksa' => now(),
                'catatan' => $request->catatan,
                'biaya_periksa' => $totalBiaya,
                'status' => 0 // Status awal, belum selesai
            ]);

            // Menyimpan data detail periksa
            $detailData = [];
            foreach ($request->obat as $IdObat) {
                $detailData[] = [
                    'id_periksa' => $periksa->id,
                    'id_obat' => $IdObat,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            // Insert detail periksa
            DetailPeriksa::insert($detailData);

            // Update status periksa menjadi selesai
            $periksa->status = 1;
            $periksa->save();

            // Update status pemeriksaan pada tabel daftar_poli
            $daftarPoli = DaftarPoli::findOrFail($request->id_daftar_poli);
            $daftarPoli->status_periksa = 1; // Sudah diperiksa
            $daftarPoli->save();

            // Commit transaksi jika semua berhasil
            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('periksa.index')->with('success', 'Pemeriksaan telah dikirim ke pasien!');
        } catch (\Exception $e) {
            // Rollback jika terjadi kesalahan
            DB::rollback();

            // Log error dan kembalikan response error
            \Log::error('Proses pemeriksaan gagal: ' . $e->getMessage());
            return redirect()->route('periksa.index')->with('error', 'Terjadi kesalahan dalam proses pemeriksaan.');
        }
    }


    // public function updateStatus($id)
    // {
    //     $periksa = Periksa::find($id);

    //     // Pastikan hanya bisa mengubah status yang masih 0 (belum selesai)
    //     if ($periksa->status == 0) {
    //         $periksa->status = 1; // Menyelesaikan pemeriksaan
    //         $periksa->save();
    //     }

    //     return redirect()->route('periksa.index')->with('success', 'Pemeriksaan selesai!');
    // }

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
