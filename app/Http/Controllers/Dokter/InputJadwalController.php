<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Iddokter = Auth::user()->dokter->id;
        $jadwals =  JadwalPeriksa::where('id_dokter', $Iddokter)->get();

        return view('dokter.pages.input-jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.pages.input-jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after::jam_mulai',
            'keterangan' => 'required',
            'jadwal_berlaku' => 'required|date|after_or_equal:today',
        ]);

        //Mengambil Id_dokter dari dokter yang sedang login
        $Iddokter = Auth::user()->dokter->id;

        // dd($Iddokter);

        //Periksa apakah jadwal bertabakan 
        $conflict = JadwalPeriksa::where('id_dokter', $Iddokter)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereRaw('? BETWEEN jam_mulai AND jam_selesai', [$request->jam_mulai])
                    ->orWhereRaw('? BETWEEN jam_mulai AND jam_selesai', [$request->jam_selesai]);
            })
            ->exists();

        if ($conflict) {
            return back()->withErrors(['conflict' => 'Jadwal bertabrakan dengan jadwal lain. Silahkan pilih waktu yang berbeda'])->withInput();
        }

        //Menonaktifkan jadwal aktif sebelumnya
        JadwalPeriksa::where('id_dokter', $Iddokter)->update(['aktif' => 0]);

        JadwalPeriksa::create([
            'id_dokter' => $Iddokter,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan' => $request->keterangan,
            'jadwal_berlaku' => $request->jadwal_berlaku,
            'aktif' => 1
        ]);

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal Berhasil ditambahakna');
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
        $jadwal = JadwalPeriksa::findorFail($id);
        return view('dokter.pages.input-jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after::jam_mulai',
            'keterangan' => 'required',
        ]);

        $jadwal = JadwalPeriksa::findorFail($id);

        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('dokter.jadwal.index', $id)->with('success', 'Jadwal Berhasil Diubah');
    }

    /**
     * Schedule activation
     */
    public function activate($id)
    {
        //Menonaktifkan jadwal lain
        JadwalPeriksa::where('aktif', 1)->update(['aktif' => 0]);

        //mengaktifkan jadwal yang dipilih 
        $jadwal = JadwalPeriksa::findorFail($id);
        $jadwal->aktif = 1;
        $jadwal->save();

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal Berhasil diaktifkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = JadwalPeriksa::find($id);

        // Cek apakah jadwal sedang aktif
        if ($jadwal->aktif) {
            return redirect()->route('dokter.jadwal.index')
                ->withErrors(['message' => 'jadwal sedang aktif nonaktifkan terlebih dahulu']);
        }
        $jadwal->delete();

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal Berhasil Dihapus');
    }
}
