<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PengunjungUmumRequest extends FormRequest
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
            'nomor_identitas' => 'required|unique:Pengunjung_Umum', 
            'nama_pengunjung' => 'required|string', 
            'email_pengunjung' => 'required|email|unique:users,email', 
            'no_telp_pengunjung' => 'required|string',
            'password' => '',
        ];
    }

    public function messages()
{
    return [
        'email_pengunjung.unique' => 'Email ini sudah terdaftar pada sistem.',
    ];
}
}
