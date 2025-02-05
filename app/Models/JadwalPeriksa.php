<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    protected $table = 'jadwal_periksa';

    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
        'jam_berlaku',
        'aktif'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }

    public function daftarPoli()
    {
        return $this->hasMany(DaftarPoli::class, 'id_jadwal');
    }
}
