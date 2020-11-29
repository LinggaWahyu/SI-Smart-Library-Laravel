<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    // use HasFactory;

    protected $table = 'Peminjaman';

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'nama_peminjam', 'id_buku', 'tanggal_peminjaman', 'jatuh_tempo_pengembalian', 'status',
    ];

    protected $hidden = [
        
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }
}
