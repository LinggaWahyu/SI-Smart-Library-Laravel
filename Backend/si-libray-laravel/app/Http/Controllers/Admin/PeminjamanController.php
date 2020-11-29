<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PeminjamanRequest;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Peminjaman::with(['buku']);

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    if ($item->status == "Kembali") {
                        return '
                            <a href="' . route('peminjaman.edit', $item->id_peminjaman) . '" class="btn btn-primary" style="float:left;" title="Hapus"><i class="fas fa-pen" style="font-size: 12px"></i></a>
                            <form action="' . route('peminjaman.destroy', $item->id_peminjaman) . '" method="POST" style="float:left;">
                                ' . method_field('delete') . csrf_field() . '
                                <button type="submit" class="btn btn-danger" title="Hapus"><i class="fas fa-trash" style="font-size: 12px"></i></button>
                            </form>
                        ';
                    } else {
                        return '
                            <a href="' . route('peminjaman.edit', $item->id_peminjaman) . '" class="btn btn-primary" style="float:left;" title="Hapus"><i class="fas fa-pen" style="font-size: 12px"></i></a>
                            <form action="' . route('peminjaman.destroy', $item->id_peminjaman) . '" method="POST" style="float:left;">
                                ' . method_field('delete') . csrf_field() . '
                                <button type="submit" class="btn btn-danger" title="Hapus"><i class="fas fa-trash" style="font-size: 12px"></i></button>
                            </form>
                            <a href="' . route('peminjaman-success', $item->id_peminjaman) . '" class="btn btn-success" style="float:left;" title="Hapus"><i class="fas fa-check" style="font-size: 12px"></i></a>
                        ';
                    }
                })
                ->editColumn('status', function($item) {
                    if ($item->status == "Kembali") {
                        return '<p class="text-center text-success">Kembali</p>';
                    } else {
                        return '<p class="text-center text-danger">Belum Kembali</p>';
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make();
        }

        return view('pages.admin.peminjaman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();

        return view('pages.admin.peminjaman.create', [
            'buku' => $buku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeminjamanRequest $request)
    {
        $data = $request->all();

        $data['status'] = 'Belum Kembali';

        Peminjaman::create($data);

        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Peminjaman::findOrFail($id);
        $buku = Buku::all();

        return view('pages.admin.peminjaman.edit', [
            'item' => $item,
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Peminjaman::findOrFail($id);

        $item->update($data);

        return redirect()->route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Peminjaman::findOrFail($id);
        $item->delete();

        return redirect()->route('peminjaman.index');
    }

    public function success($id_peminjaman) 
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);

        $date_now = strtotime(date("Y-m-d"));
        $date_tempo = strtotime($peminjaman->jatuh_tempo_pengembalian);

        $beda = $date_tempo - $date_now;

        $date = date("Y-m-d");

        $denda = 0;

        if($beda > 0)
        {
            $status = 'Tepat Waktu';
        } else {
            $status = 'Terlambat';
            $selisih_hari = date_diff(date_create($peminjaman->jatuh_tempo_pengembalian), date_create())->days;
            $denda = 500 * $selisih_hari;
        }

        $data = [
            'id_peminjaman' => $id_peminjaman,
            'tanggal_pengembalian' => date("Y-m-d"),
            'status' => $status,
            'denda' => $denda
        ];

        Pengembalian::create($data);

        $dataPeminjaman = [
            'status' => 'Kembali'
        ];

        $item = Peminjaman::findOrFail($id_peminjaman);

        $item->update($dataPeminjaman);

        return redirect()->route('pengembalian.index');
    }
}
