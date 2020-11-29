<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengunjungUmum extends Model
{
    // use HasFactory;

    protected $table = 'Pengunjung_Umum';

    protected $primaryKey = 'id_pengunjung_umum';

    protected $fillable = [
        'nomor_identitas', 'nama_pengunjung', 'email_pengunjung', 'no_telp_pengunjung', 'password'
    ];

    protected $hidden = [
        
    ];
}
