<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = ['nama', 'alamat', 'no_ktp', 'no_hp', 'no_rw', 'user_id', 'created_at', 'updated_at'];

    public function daftarPoli()
    {
        return $this->hasMany(DaftarPoli::class, 'id_pasien');
    }

    // Relasi pasien ke user
    public function user()
    {
        return $this->belongsTo(User::class); // Relasi belongsTo karena pasien terkait dengan user
    }

    public function periksa()
    {
        return $this->hasMany(Periksa::class, 'id_pasien');
    }
}
