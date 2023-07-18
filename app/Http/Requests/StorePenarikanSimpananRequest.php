<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenarikanSimpananRequest extends FormRequest
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
            'tgl_transaksi' => 'required|date',
            'jenis_simpanan' => 'required|numeric',
            'jumlah_penarikan' => 'required|numeric',
            'dari_kas' => 'required|numeric',
            'keterangan' => 'nullable|string|max:255'
        ];
    }
}
