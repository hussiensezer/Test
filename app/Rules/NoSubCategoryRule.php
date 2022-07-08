<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class NoSubCategoryRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        // Check If The Category Has Child Because if have Child Cannot Bind Item With Him
        $category = Category::where('parent_id', $value)->get();

        return !(count($category) > 0);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() :string
    {
        return 'This Category Cant Accept Look For SubCategory Of Him';
    }
}
