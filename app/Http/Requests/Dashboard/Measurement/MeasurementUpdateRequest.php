<?php

namespace App\Http\Requests\Dashboard\Measurement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MeasurementUpdateRequest extends FormRequest
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
        $rules = [
            'status' => ['required', 'boolean'],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules += [
                'name.' . $localeCode        => ['required', Rule::unique('measurements', 'name->' . $localeCode)->ignore($this->measurement)],
            ];
        }
        return $rules;
    }
}
