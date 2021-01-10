<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataThingRequest extends FormRequest
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
            'data_id'=>'required|integer|exists:nama_things,id',
            'nama'=>'required|max:255',
            'harga'=>'required|integer',
            'hargajual'=>'required|integer',
            'stok'=>'required|integer',
            'satuan'=>'required|max:30'
        ];
    }
}
