<?php

namespace App\Http\Requests\Dashboard\Item\Attachment;

use Illuminate\Foundation\Http\FormRequest;

class ImageStoreRequest extends FormRequest
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
            // Attachments Images
            'images.0'       => [
                'required',
                'image',
                'mimes:' . config('setting.image.allow_extensions'),
                'max:' . config('setting.image.size')
            ],
            'images.*'       => [
                'required',
                'image',
                'mimes:' . config('setting.image.allow_extensions'),
                'max:' . config('setting.image.size')
            ],
        ];
    }
}
