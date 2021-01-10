<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
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
            'penjualan_id'=>'integer',
            'nama'=>'max:255',
            'jumlah'=>'required',
            'harga_jual'=>'required',
            'keterangan'=>'max:255'
            // 'harga_jual'=>'required|integer',
        ];
    }
}
