<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daftarpoli extends Model
{
    protected $table = 'daftar_poli';

    protected $fillable = [
        'id',
        'id_pasien',
        'poli_id',
        'dokter_id',
        'jadwal_id',
        'keluhan',
        'no_antrian',
        'status_periksa'
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'jadwal_id', 'id');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id', 'id');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function periksa()
    {
        return $this->hasMany(Periksa::class, 'id_daftar_poli');
    }
}
