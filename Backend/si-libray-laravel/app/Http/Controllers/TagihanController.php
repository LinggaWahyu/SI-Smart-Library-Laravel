<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use App\Models\PengunjungUmum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    public function index()
    {
        $user_login = Auth::user()->name;

        $mahasiswa = Mahasiswa::with(['jurusan'])->where('nama_mahasiswa', $user_login)->first();
        $dosen = Dosen::query()->where('nama_dosen', $user_login)->first();
        $pengunjung = PengunjungUmum::query()->where('nama_pengunjung', $user_login)->first();
        $admin = User::query()->where('name', $user_login)->first();

        if($mahasiswa) {
            $user = [
                'nama' => $mahasiswa->nama_mahasiswa,
                'jurusan' => $mahasiswa->jurusan->nama_jurusan,
                'no_telp' => $mahasiswa->no_telp_mahasiswa,
            ];
        } else if($dosen) {
            $user = [
                'nama' => $dosen->nama_dosen,
                'jurusan' => '-',
                'no_telp' => $dosen->no_telp_dosen,
            ];
        } else if($pengunjung) {
            $user = [
                'nama' => $pengunjung->nama_pengunjung,
                'jurusan' => '-',
                'no_telp' => $pengunjung->no_telp_pengunjung,
            ];
        } else {
            $user = [
                'nama' => $admin->name,
                'jurusan' => '-',
                'no_telp' => '-',
            ];
        }

        $tagihan = Peminjaman::with(['buku'])
            ->where('nama_peminjam', $user_login)
            ->where('status', "Belum Kembali")
            ->get();

        if(count($tagihan) == 0) {
            $tagihan = null;
        }  

        return view('pages.cek-tagihan', [
            'user' => $user,
            'tagihan' => $tagihan
        ]);
    }
}
