<?php

namespace App\Http\Requests\Dashboard\Attribute;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AttributeUpdateRequest extends FormRequest
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
            'status'        => ['required', 'boolean'],
            'type_field'    => ['required', Rule::in(['text', 'textarea', 'select','multi_select','color','radio','checkbox','number'])],
            'default_value' => ['sometimes', 'nullable']
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules += [
                'name.' . $localeCode  => ['required', Rule::unique('attributes', 'name->' . $localeCode)->ignore($this->attribute)],
            ];
        }
        return $rules;
    }
}
