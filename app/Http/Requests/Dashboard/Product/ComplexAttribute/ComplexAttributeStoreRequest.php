<?php

namespace App\Http\Requests\Dashboard\Product\ComplexAttribute;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComplexAttributeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'complex.0.attributes'      => ['required',Rule::exists('attributes', 'id') ],
            'complex.0.values'          => ['required'],
            'complex.0.price'           => ['required', 'gt:0','regex:/^[0-9]+$/'],
            'complex.0.quantity'        => ['required', 'gt:0','regex:/^[0-9]+$/'],

            'complex.*.attributes'      => ['required',Rule::exists('attributes', 'id') ],
            'complex.*.values'          => ['required'],
            'complex.*.price'           => ['required', 'gt:0','regex:/^[0-9]+$/'],
            'complex.*.quantity'        => ['required', 'gt:0','regex:/^[0-9]+$/'],
        ];
    }
}
