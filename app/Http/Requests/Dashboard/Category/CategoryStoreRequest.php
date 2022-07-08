<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        $rules = [
            'status'        => ['required', 'boolean'],
            'slug'          => ['required',Rule::unique('categories', 'slug')->where('category_type', $this->category_type)],
            'parent_id'     => ['sometimes','nullable' ,Rule::exists('categories', 'id')->where('category_type', $this->category_type)],
            'image'         => ['required', 'image', 'mimes:' . config('setting.image.allow_extensions'),'max:' . config('setting.image.size')],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
           $rules += [
               'name.' . $localeCode        => ['required', Rule::unique('categories', 'name->' . $localeCode)
                   ->where('category_type', $this->category_type)],
               'description.' . $localeCode => ['required']
           ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        $category = array($this->parent_id);
        $this->merge([
            'slug'      => Str::slug($this->slug),
            'parent_id' => end($category)
        ]);
    }
}
