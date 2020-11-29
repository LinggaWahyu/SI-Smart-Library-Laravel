<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // use HasFactory;

    protected $table = 'Jurusan';

    protected $primaryKey = 'id_jurusan';

    protected $fillable = [
        'nama_jurusan'
    ];

    protected $hidden = [

    ];
}
