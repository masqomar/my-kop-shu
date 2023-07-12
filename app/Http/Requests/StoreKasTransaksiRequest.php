<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKasTransaksiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tgl_catat' => 'required|date',
            'jumlah' => 'required|numeric',
            'akun_id' => 'required|numeric',
            'untuk_kas' => 'required|numeric',
            'keterangan' => 'required|string',
        ];
    }
}
