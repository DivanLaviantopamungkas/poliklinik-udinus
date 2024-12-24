<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataDokter = Dokter::All();
        $poliklinik = Poli::All();
        return view('admin.pages.data-dokter.index', compact('dataDokter', 'poliklinik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poliklinik = Poli::all();
        return view('admin.pages.data-dokter.create', compact('poliklinik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'id_poli' => 'required|exists:poli,id',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]
        );

        //validasi jika ada salah validasi 
        if ($validator->fails()) {
            return redirect()->route('dokter.create')
                ->withErrors($validator) // Mengirim error ke view
                ->withInput(); // Mengembalikan input sebelumnya
        }

        //Menyimpan Data Menuju user 
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dokter'
        ]);

        Dokter::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
            'user_id' => $user->id
        ]);

        return redirect()->route('data.dokter')->with('success', 'Data Dokter behasil ditambahkan!');
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
