<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MahasiswaRequest;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
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
            $query = Mahasiswa::with(['jurusan']);

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a href="' . route('mahasiswa.edit', $item->id_mahasiswa) . '" class="btn btn-primary" style="float:left;" title="Hapus"><i class="fas fa-pen" style="font-size: 12px"></i></a>
                        <form action="' . route('mahasiswa.destroy', $item->id_mahasiswa) . '" method="POST">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger" title="Hapus"><i class="fas fa-trash" style="font-size: 12px"></i></button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();

        return view('pages.admin.mahasiswa.create', [
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        Mahasiswa::create($data);

        User::create([
            'name' => $data['nama_mahasiswa'],
            'email' => $data['email_mahasiswa'],
            'password' => $data['password'],
        ]);

        return redirect()->route('mahasiswa.index');
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
        $item = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('pages.admin.mahasiswa.edit', [
            'item' => $item,
            'jurusan' => $jurusan
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

        if($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $item = Mahasiswa::findOrFail($id);

        $user = User::where('email', $item['email_mahasiswa'])->firstOrFail();

        $item->update($data);

        $dataUser = [
            'name' => $item['nama_mahasiswa'],
            'email' => $item['email_mahasiswa'],
            'password' => $item['password'],
        ];

        $user->update($dataUser);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Mahasiswa::findOrFail($id);
        $user = User::where('email', $item['email_mahasiswa'])->firstOrFail();
        $item->delete();
        $user->delete();

        return redirect()->route('mahasiswa.index');
    }
}
