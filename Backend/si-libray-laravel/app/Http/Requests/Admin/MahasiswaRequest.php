<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
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
            'NIM' => 'required|unique:Mahasiswa', 
            'nama_mahasiswa' => 'required|string', 
            'email_mahasiswa' => 'required|email|unique:users,email', 
            'id_jurusan' => 'required', 
            'alamat_mahasiswa' => 'required', 
            'no_telp_mahasiswa' => 'required|string',
            'password' => '',
        ];
    }
}
