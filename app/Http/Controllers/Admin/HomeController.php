<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckRole;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     // Hanya admin yang bisa mengakses controller ini
    //     $this->middleware('role:admin');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPasien = Pasien::count();
        $dataDokter = Dokter::count();
        $dataPoli = Poli::count();
        $pasienTerbaru = Pasien::latest()->take(3)->get();
        return view('admin.pages.home.index', compact('dataPasien', 'dataDokter', 'dataPoli', 'pasienTerbaru'));
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
