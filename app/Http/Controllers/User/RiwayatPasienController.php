<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Periksa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RiwayatPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->pasien;

        $periksa = Periksa::whereHas('daftarpoli', function ($query) use ($user) {
            $query->where('id_pasien', $user->id);
        })
            ->with(['daftarpoli.poli', 'daftarpoli.dokter', 'detailPeriksa.obat'])
            ->get();


        return view('user.pages.riwayat-pasien.index', compact('periksa'));
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
