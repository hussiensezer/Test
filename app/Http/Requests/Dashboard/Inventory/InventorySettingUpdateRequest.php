<?php

namespace App\Http\Requests\Dashboard\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class InventorySettingUpdateRequest extends FormRequest
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
            'manual_withdraw'       => ['required', 'boolean'],
            'limit_alert'           => ['required', 'regex:/^[0-9]+$/'],
            'prefix_code_item'      => ['required'],
            'prefix_code_product'   => ['required']
        ];
    }
}
