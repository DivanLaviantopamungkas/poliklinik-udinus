<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daftarpoli extends Model
{
    protected $table = 'daftar_poli';

    protected $fillable = ['id', 'id_pasien', 'id_jadwal', 'keluhan', 'no_antrian'];
}
