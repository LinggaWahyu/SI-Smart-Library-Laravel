<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Yajra\DataTables\Facades\DataTables;

class LaporanPengembalianController extends Controller
{
    public function index($bulan)
    {
        $month = $bulan;

        if(request()->ajax())
        {
            $query = Pengembalian::with(['peminjaman'])->whereMonth('tanggal_pengembalian', '=', "$month")->get();

            return DataTables::of($query)
                ->editColumn('status', function($item) {
                    if ($item->status == "Tepat Waktu") {
                        return '<p class="text-center text-success">Tepat Waktu</p>';
                    } else {
                        return '<p class="text-center text-danger">Terlambat</p>';
                    }
                })
                ->editColumn('denda', function($item) {
                    return 'Rp. ' . number_format($item->denda, 0, ".", ".") . ',-';
                })
                ->editColumn('peminjaman.id_buku', function($item) {
                    $buku = Buku::findOrFail($item->peminjaman->id_buku);
                    return $buku->judul;
                })
                ->rawColumns(['status'])
                ->make();
        }

        return view('pages.admin.laporan-bulanan.pengembalian', [
            'bulan' => $month
        ]);
    }

    public function show(Request $request) 
    {
        $data = $request->all();

        return redirect()->route('laporan-pengembalian', $data['bulan']);
    }
}
