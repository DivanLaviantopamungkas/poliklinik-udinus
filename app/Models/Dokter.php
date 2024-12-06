<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = ['nama', 'alamat', 'no_hp', 'id_poli'];

    public function poliklinik()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id');
    }
}
