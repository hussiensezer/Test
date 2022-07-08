<?php

namespace App\Http\Requests\Dashboard\Product\Item;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemUpdateRequest extends FormRequest
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
            'item'  => ['required',
                Rule::exists('items', 'id'),
                Rule::unique('product_items', 'item_id')
                    ->ignore($this->item)
                    ->where('product_id' ,'!=', $this->product)

            ],
            'value' => ['required', 'regex:/^[0-9]+$/'],

        ];
    }
}
