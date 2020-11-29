<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DosenRequest extends FormRequest
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
            'NIP' => 'required|unique:Dosen', 
            'nama_dosen' => 'required|string', 
            'email_dosen' => 'required|email|unique:users,email', 
            'alamat_dosen' => 'required', 
            'no_telp_dosen' => 'required|string',
            'password' => '',
        ];
    }
}
