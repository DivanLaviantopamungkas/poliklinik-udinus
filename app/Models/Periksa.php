<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $table = 'priksa';

    protected $fillable = [
        'id_daftar_poli',
        'tgl_periksa',
        'catatan',
        'biaya_dokter',
        'biaya_periksa',
        'status'
    ];

    public function daftarpoli()
    {
        return $this->belongsTo(Daftarpoli::class, 'id_daftar_poli');
    }

    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function pasien()
    {
        return $this->hasOneThrough(Pasien::class, DaftarPoli::class, 'id', 'id', 'id_daftar_poli', 'id_pasien');
    }
}
