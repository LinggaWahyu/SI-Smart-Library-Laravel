<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    // use HasFactory;

    protected $table = 'Pengembalian';

    protected $primaryKey = 'id_pengembalian';

    protected $fillable = [
        'id_peminjaman', 'tanggal_pengembalian', 'status', 'denda',
    ];

    protected $hidden = [
        
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman', 'id_peminjaman');
    }
}
