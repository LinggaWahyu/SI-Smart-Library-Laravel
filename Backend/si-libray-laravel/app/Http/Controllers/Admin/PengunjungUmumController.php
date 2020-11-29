<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PengunjungUmumRequest;
use App\Models\PengunjungUmum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PengunjungUmumController extends Controller
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
            $query = PengunjungUmum::query();

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a href="' . route('pengunjung-umum.edit', $item->id_pengunjung_umum) . '" class="btn btn-primary" style="float:left;" title="Hapus"><i class="fas fa-pen" style="font-size: 12px"></i></a>
                        <form action="' . route('pengunjung-umum.destroy', $item->id_pengunjung_umum) . '" method="POST">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger" title="Hapus"><i class="fas fa-trash" style="font-size: 12px"></i></button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.pengunjung-umum.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pengunjung-umum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengunjungUmumRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        PengunjungUmum::create($data);

        User::create([
            'name' => $data['nama_pengunjung'],
            'email' => $data['email_pengunjung'],
            'password' => $data['password'],
        ]);

        if (Auth::check()) {
            return redirect()->route('pengunjung-umum.index');
        } else {
            return redirect()->route('login');
        }
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
        $item = PengunjungUmum::findOrFail($id);

        return view('pages.admin.pengunjung-umum.edit', [
            'item' => $item,
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

        $item = PengunjungUmum::findOrFail($id);

        $user = User::where('email', $item['email_pengunjung'])->firstOrFail();

        $item->update($data);

        $dataUser = [
            'name' => $item['nama_pengunjung'],
            'email' => $item['email_pengunjung'],
            'password' => $item['password'],
        ];

        $user->update($dataUser);

        return redirect()->route('pengunjung-umum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PengunjungUmum::findOrFail($id);
        $user = User::where('email', $item['email_pengunjung'])->firstOrFail();
        $item->delete();
        $user->delete();

        return redirect()->route('pengunjung-umum.index');
    }
}
