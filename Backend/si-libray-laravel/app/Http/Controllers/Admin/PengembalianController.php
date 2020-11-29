<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengembalianController extends Controller
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
            $query = Pengembalian::with(['peminjaman']);

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

        return view('pages.admin.pengembalian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_peminjaman)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pengembalian::findOrFail($id);
        $item->delete();

        return redirect()->route('pengembalian.index');
    }
}
