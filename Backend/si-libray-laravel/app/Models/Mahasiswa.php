<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // use HasFactory;

    protected $table = 'Mahasiswa';

    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'NIM', 'nama_mahasiswa', 'email_mahasiswa', 'id_jurusan', 'alamat_mahasiswa', 'no_telp_mahasiswa', 'password'
    ];

    protected $hidden = [
        
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
}
