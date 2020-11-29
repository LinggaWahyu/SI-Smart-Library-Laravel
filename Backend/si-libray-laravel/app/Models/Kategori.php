<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // use HasFactory;

    protected $table = 'Kategori_Buku';

    protected $primaryKey = 'id_kategori_buku';

    protected $fillable = [
        'nama_kategori_buku'
    ];

    protected $hidden = [

    ];
}
