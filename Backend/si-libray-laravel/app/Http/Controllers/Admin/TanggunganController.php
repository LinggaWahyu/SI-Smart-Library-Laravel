<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TanggunganController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = DB::table('Peminjaman')
                ->join('Mahasiswa', 'Mahasiswa.nama_mahasiswa', '=', 'Peminjaman.nama_peminjam')
                ->join('Jurusan', 'Mahasiswa.id_jurusan', '=', 'Jurusan.id_jurusan')
                ->where('Peminjaman.status', '=', 'Belum Kembali')
                ->groupBy('Mahasiswa.nama_mahasiswa')
                ->get();

            return DataTables::of($query)
                ->editColumn('keterangan', function() {
                    return 'Terdapat Buku yang Belum Dikembalikan';
                })
                ->make();
        }

        return view('pages.admin.cek-tanggungan.index');
    }
}
