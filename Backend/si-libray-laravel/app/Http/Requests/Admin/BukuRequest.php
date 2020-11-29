<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
            'nomor_buku' => 'required', 
            'judul' => 'required|string', 
            'penulis' => 'required|string', 
            'penerbit' => 'required|string', 
            'stok_buku' => 'required|integer', 
            'id_kategori_buku' => 'required', 
            'nomor_rak' => 'required|string'
        ];
    }
}
