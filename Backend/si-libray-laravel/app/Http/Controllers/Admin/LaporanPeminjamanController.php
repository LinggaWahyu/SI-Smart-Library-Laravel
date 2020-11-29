<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Yajra\DataTables\Facades\DataTables;

class LaporanPeminjamanController extends Controller
{
    public function index($bulan)
    {
        $month = $bulan;

        if(request()->ajax())
        {
            $query = Peminjaman::with(['buku'])->whereMonth('tanggal_peminjaman', '=', "$month")->get();

            return DataTables::of($query)
                ->editColumn('status', function($item) {
                    if ($item->status == "Kembali") {
                        return '<p class="text-center text-success">Kembali</p>';
                    } else {
                        return '<p class="text-center text-danger">Belum Kembali</p>';
                    }
                })
                ->rawColumns(['status'])
                ->make();
        }

        return view('pages.admin.laporan-bulanan.peminjaman', [
            'bulan' => $month
        ]);
    }

    public function show(Request $request) 
    {
        $data = $request->all();

        return redirect()->route('laporan-peminjaman', $data['bulan']);
    }
}
