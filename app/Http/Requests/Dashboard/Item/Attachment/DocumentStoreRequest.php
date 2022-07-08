<?php

namespace App\Http\Requests\Dashboard\Item\Attachment;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
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
            'documents.0'    => [
                'required',
                'mimes:' . config('setting.document.allow_extensions'),
                'max:' . config('setting.document.size'),
            ],
            // Attachments Documents
            'documents.*'    => [
                'required',
                'mimes:' . config('setting.document.allow_extensions'),
                'max:' . config('setting.document.size'),
            ],
        ];
    }
}
