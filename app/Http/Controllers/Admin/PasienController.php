<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPasien = Pasien::All();
        return view('admin.pages.data-pasien.index', compact('dataPasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.data-pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'no_rw' => 'required',
        ]);

        Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rw' => $request->no_rw
        ]);

        return redirect()->route('data.pasien')->with('success', 'Data Berhasil Ditambahkan');
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
        //Mencari data pasien berdasarkan id
        $pasien = Pasien::findOrFail($id);

        return view('admin.pages.data-pasien.update', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'no_rw' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rw' => $request->no_rw
        ]);

        return redirect()->route('data.pasien')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        return redirect()->route('data.pasien')->with('success', 'Data Berhasil Dihapus');
    }
}
