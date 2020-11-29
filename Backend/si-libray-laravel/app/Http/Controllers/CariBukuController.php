<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class CariBukuController extends Controller
{
    public function index()
    {
        $books = Buku::with(['kategori'])->get();

        return view('pages.cari-buku', [
            'books' => $books,
            'keyword' => null
        ]);
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $keyword = $data['keyword'];

        $books = Buku::with(['kategori'])
            ->where('judul', 'like', "%".$keyword."%")
            ->get();

        if(count($books) == 0) {
            $books = null;
        }    

        return view('pages.cari-buku', [
            'books' => $books,
            'keyword' => $keyword
        ]);    
    }
}
