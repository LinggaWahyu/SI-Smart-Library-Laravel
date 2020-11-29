<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DosenRequest;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class DosenController extends Controller
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
            $query = Dosen::query();

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a href="' . route('dosen.edit', $item->id_dosen) . '" class="btn btn-primary" style="float:left;" title="Hapus"><i class="fas fa-pen" style="font-size: 12px"></i></a>
                        <form action="' . route('dosen.destroy', $item->id_dosen) . '" method="POST">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger" title="Hapus"><i class="fas fa-trash" style="font-size: 12px"></i></button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DosenRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        Dosen::create($data);

        User::create([
            'name' => $data['nama_dosen'],
            'email' => $data['email_dosen'],
            'password' => $data['password'],
        ]);

        return redirect()->route('dosen.index');
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
        $item = Dosen::findOrFail($id);

        return view('pages.admin.dosen.edit', [
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

        $item = Dosen::findOrFail($id);

        $user = User::where('email', $item['email_dosen'])->firstOrFail();

        $item->update($data);

        $dataUser = [
            'name' => $item['nama_dosen'],
            'email' => $item['email_dosen'],
            'password' => $item['password'],
        ];

        $user->update($dataUser);

        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Dosen::findOrFail($id);
        $user = User::where('email', $item['email_dosen'])->firstOrFail();
        $item->delete();
        $user->delete();

        return redirect()->route('dosen.index');
    }
}
