<?php

namespace App\Http\Requests\Dashboard\Product;

use App\Rules\NoSubCategoryRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductStoreRequest extends FormRequest
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
            // Main Info For Product
            'category'                   => ['required', Rule::exists('categories', 'id')
                ->where(function($query){
                $query->where('category_type', 'product');})
                ,new NoSubCategoryRule()],

            'bar_code_scanner'          => ['required', Rule::unique('products', 'bar_code_scanner')],
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

           // Attachment Of Images

            'images.*'                  =>[
                'required',
                'image',
                'mimes:' . config('setting.image.allow_extensions'),
                'max:' . config('setting.image.size')
            ],

           // Attachment Of Documents
            'documents.*'               =>[
                'sometimes',
                'nullable',
                'mimes:' . config('setting.document.allow_extensions'),
                'max:' . config('setting.image.size')
            ],

            // Basic Attributes
            'attributes.*.attribute'    => ['required', Rule::exists('attributes', 'id')],
            'attributes.*.value'        => ['required'],



            //Complex Attributes
            'complex.*.attributes'      =>  ['required',Rule::exists('attributes', 'id') ],
            'complex.*.values'          =>  ['required'],
            'complex.*.price'           =>  ['required', 'gt:0','regex:/^[0-9]+$/'],
            'complex.*.quantity'        =>  ['required', 'gt:0','lte:quantity','regex:/^[0-9]+$/'],

            // Manufacturing Processes
            'manufacturing_process.*.manufacturing'   => ['required', Rule::exists('manufacturing_processes', 'id')],

            // Items
            'items.*.item'              => ['required', Rule::exists('items', 'id')],
            'items.*.value'             => ['required', 'regex:/^[0-9]+$/']

        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules += [
                //Item
                'name.' . $localeCode                => ['required', Rule::unique('products', 'name->' . $localeCode)],
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
