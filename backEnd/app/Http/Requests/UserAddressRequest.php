<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
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
            'number'    => 'required',
            'village'   => 'required',
            'district'  => 'required',
            'province'  => 'required',
            'postal_code'   => 'required|numeric',
            'complate_address'  => 'required',
        ];
    }
}
