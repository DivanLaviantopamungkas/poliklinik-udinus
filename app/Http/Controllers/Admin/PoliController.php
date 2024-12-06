<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPoliklinik = Poli::All();
        return view('admin.pages.poliklinik.index', compact('dataPoliklinik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.poliklinik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required',
        ]);

        Poli::create([
            'nama_poli' => $request->nama_poli,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('poliklinik')->with('success', 'Poliklinik berhasil ditambahkan');
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
        $poliklinik = Poli::findOrFail($id);

        return view('admin.pages.poliklinik.edit', compact('poliklinik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_poli' => 'required'
        ]);

        $poliklinik = Poli::findOrFail($id);

        $poliklinik->update([
            'nama_poli' => $request->nama_poli,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('poliklinik')->with('success', 'Data Polilinik berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poliklinik = Poli::find($id);
        $poliklinik->delete();
        return redirect()->route('poliklinik')->with('success', 'Data Poliklinik berhasil dihapus!');
    }
}
