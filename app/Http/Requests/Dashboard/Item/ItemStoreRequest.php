<?php

namespace App\Http\Requests\Dashboard\Item;

use App\Rules\NoSubCategoryRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ItemStoreRequest extends FormRequest
{
    /**
     * @var mixed
     */

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

            // Main Info For Item
            'category'       => ['required', Rule::exists('categories', 'id')->where(function($query){
                $query->where('category_type', 'item');
            }) ,new NoSubCategoryRule()],
            'bar_code_scanner'          => ['required', Rule::unique('items', 'bar_code_scanner')],
            'code'                      => ['sometimes', 'nullable', Rule::unique('items', 'code')],
            'measurement'               => ['required', Rule::exists('measurements', 'id')],
            'price'                     => ['required','gt:0', 'regex:/^[0-9]+$/'],
            'quantity'                  => ['required', 'gt:0', 'regex:/^[0-9]+$/'],
            'alert_limit'               => ['sometimes','nullable', 'gt:0', 'regex:/^[0-9]+$/'],
            'thumbnail'                 => [
                'required',
                'image',
                'mimes:' . config('setting.image.allow_extensions'),
                'max:' . config('setting.image.size')
            ],

            // Attachments Images
            'images.*'       => [
                'required',
                'image',
                'mimes:' . config('setting.image.allow_extensions'),
                'max:' . config('setting.image.size')
            ],

            // Attachments Documents
            'documents.*'    => [
                'sometimes',
                'nullable',
                'mimes:' . config('setting.document.allow_extensions'),
                'max:' . config('setting.document.size'),
            ],

            // Basic Attributes

            'attributes.*.attribute'    => ['required', Rule::exists('attributes', 'id')],
            'attributes.*.value'        => ['required'],


            //Complex Attributes

            'complex.*.attributes'      => ['required',Rule::exists('attributes', 'id') ],
            'complex.*.values'          => ['required'],
            'complex.*.price'           => ['required', 'gt:0','regex:/^[0-9]+$/'],
            'complex.*.quantity'        => ['required', 'gt:0','lte:quantity','regex:/^[0-9]+$/'],


        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules += [
                //Item
                'name.' . $localeCode                => ['required', Rule::unique('items', 'name->' . $localeCode)],
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
