<?php

namespace App\Http\Requests\Dashboard\ManufacturingProcess;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        $rules = [
            'status'    => ['required', 'boolean'],
        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules += [
                'name.'.$localeCode        => ['required', Rule::unique('manufacturing_processes', 'name->' . $localeCode)],
            ];
        }
        return $rules;
    }
}
