<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProfileDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataDokter = auth()->user()->dokter;  // Mengambil data dokter berdasarkan user yang login
        $poli = Poli::all();  // Ambil data Poli untuk dropdown
        return view('dokter.pages.profile.index', compact('dataDokter', 'poli'));
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
        $dataDokter = Dokter::findOrFail($id);  // Menemukan data dokter berdasarkan ID
        $poli = Poli::all();  // Ambil data Poli
        return view('dokter.pages.profile.edit', compact('dataDokter', 'poli'));  // Tampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required|exists:poli,id',
            'password' => 'nullable|min:8|confirmed', // Menambahkan validasi password
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->route('profile.dokter.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // Cari dokter berdasarkan ID
        $dokter = Dokter::findOrFail($id);

        // Update profil dokter
        $dokter->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);

        // Jika password diubah, update password pengguna
        if ($request->filled('password')) {
            $user = $dokter->user; // Mengakses pengguna terkait dokter
            $user->password = Hash::make($request->password); // Enkripsi password baru
            $user->save(); // Simpan perubahan password
        }

        return redirect()->route('profile.dokter.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
