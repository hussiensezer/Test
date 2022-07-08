<?php

namespace App\Http\Requests\Dashboard\Product;

use App\Rules\NoSubCategoryRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductUpdateRequest extends FormRequest
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
            // Main Info For Product
            'category'                   => ['required', Rule::exists('categories', 'id')
                ->where(function($query){
                    $query->where('category_type', 'product');})
                ,new NoSubCategoryRule()],

            'bar_code_scanner'          => ['required', Rule::unique('products', 'bar_code_scanner')->ignore($this->product)],
            'code'                      => ['sometimes', 'nullable', Rule::unique('products', 'code')],
            'measurement'               => ['required', Rule::exists('measurements', 'id')],
            'price'                     => ['required','gt:0', 'regex:/^[0-9]+$/'],
            'quantity'                  => ['required','gt:0', 'regex:/^[0-9]+$/'],
            'alert_limit'               => ['sometimes','nullable','gt:0', 'regex:/^[0-9]+$/'],
            'thumbnail'                 => [
                'required',
                'image',
                'mimes:' . config('setting.image.allow_extensions'),
                'max:' . config('setting.image.size')
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules += [
                //Item
                'name.' . $localeCode                => ['required', Rule::unique('products', 'name->' . $localeCode)->ignore($this->product)],
                'description.' . $localeCode         => ['required'],
            ];
        }

        return $rules;
    }

    protected function prepareForValidation()
    {

        $category = array($this->category);

        $this->merge([
            'category' => end($category),

        ]);
    }
}
