<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // use HasFactory;

    protected $table = 'Dosen';

    protected $primaryKey = 'id_dosen';

    protected $fillable = [
        'NIP', 'nama_dosen', 'email_dosen', 'alamat_dosen', 'no_telp_dosen', 'password'
    ];

    protected $hidden = [
        
    ];
}
