<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_peminjam' => 'required|string',
            'id_buku' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'jatuh_tempo_pengembalian' => 'required|date',
        ];
    }
}
