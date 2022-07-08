<?php

namespace App\Http\Requests\Dashboard\Product\ManufacturingProcessUpdateRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ManufacturingProcessStoreRequest extends FormRequest
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
            'manufacturing_process.0.manufacturing'   => ['required',
                Rule::exists('manufacturing_processes', 'id'),
                Rule::unique('product_manufacturing_processes', 'manufacturing_process_id')
                    ->where('product_id', '!=',$this->product)
            ],

            'manufacturing_process.*.manufacturing'   => ['required',
                Rule::exists('manufacturing_processes', 'id'),
                Rule::unique('product_manufacturing_processes', 'manufacturing_process_id')
                    ->where('product_id', '!=',$this->product)
            ],


        ];
    }
}
