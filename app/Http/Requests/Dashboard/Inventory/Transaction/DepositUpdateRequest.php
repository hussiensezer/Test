<?php

namespace App\Http\Requests\Dashboard\Inventory\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class DepositUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'quantity'  => ['required', 'gt:0', 'regex:/^[0-9]+$/']
        ];
    }
}
