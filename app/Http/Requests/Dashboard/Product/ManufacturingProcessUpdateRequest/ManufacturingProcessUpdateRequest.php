<?php

namespace App\Http\Requests\Dashboard\Product\ManufacturingProcessUpdateRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ManufacturingProcessUpdateRequest extends FormRequest
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
            // Manufacturing Processes
            'manufacturing'   => ['required',
                Rule::exists('manufacturing_processes', 'id'),
                Rule::unique('product_manufacturing_processes', 'manufacturing_process_id')
                    ->ignore($this->manufacturing)
                    ->where('product_id', '!=',$this->product)
                ]
        ];
    }
}
