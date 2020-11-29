<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\Admin\BukuRequest;
use App\Models\Buku;
use App\Models\Kategori;

class BukuController extends Controller
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
            $query = Buku::with(['kategori']);

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a href="' . route('buku.edit', $item->id_buku) . '" class="btn btn-primary" style="float:left;" title="Hapus"><i class="fas fa-pen" style="font-size: 12px"></i></a>
                        <form action="' . route('buku.destroy', $item->id_buku) . '" method="POST">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger" title="Hapus"><i class="fas fa-trash" style="font-size: 12px"></i></button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.buku.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_buku = Kategori::all();

        return view('pages.admin.buku.create', [
            'kategori_buku' => $kategori_buku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        $data = $request->all();

        Buku::create($data);

        return redirect()->route('buku.index');
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
        $item = Buku::where('id_buku', '=', $id)->firstOrFail();
        $kategori_buku = Kategori::all();

        return view('pages.admin.buku.edit', [
            'item' => $item,
            'kategori_buku' => $kategori_buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, $id)
    {
        $data = $request->all();

        $item = Buku::where('id_buku', $id)->firstOrFail()->update($data);

        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Buku::findOrFail($id);
        $item->delete();

        return redirect()->route('buku.index');
    }
}
