<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\PengunjungUmum;
use App\Models\Buku;

class DashboardController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::count();
        $dosen = Dosen::count();
        $pengunjung = PengunjungUmum::count();
        $buku = Buku::count();

        return view('pages.admin.dashboard', [
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'pengunjung' => $pengunjung,
            'buku' => $buku,
        ]);
    }
}
