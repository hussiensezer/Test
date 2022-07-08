<?php

namespace App\Http\Requests\Dashboard\Product\Item;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemStoreRequest extends FormRequest
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
            // Items
            'items.0.item'  => ['required',
                Rule::exists('items', 'id'),
                Rule::unique('product_items', 'item_id')
                ->where('product_id' ,'!=', $this->product)
            ],
            'items.0.value' => ['required', 'regex:/^[0-9]+$/'],

            // Items
            'items.*.item'  => ['required',
                Rule::exists('items', 'id'),
                Rule::unique('product_items', 'item_id')
                    ->where('product_id' ,'!=', $this->product)

            ],
            'items.*.value' => ['required', 'regex:/^[0-9]+$/']
        ];
    }
}
