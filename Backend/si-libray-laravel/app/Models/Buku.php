<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
   // use HasFactory;

    protected $table = 'Buku';

    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'nomor_buku', 'judul', 'penulis', 'penerbit', 'stok_buku', 'id_kategori_buku', 'nomor_rak'
    ];

    protected $hidden = [

    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori_buku', 'id_kategori_buku');
    }
}
