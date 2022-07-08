<?php

namespace App\Services\Attribute;

use App\Models\Attribute;
use App\Traits\FormatResponseTrait;

class AttributeService
{
    use FormatResponseTrait;
    public function attributes() :object
    {
        return Attribute::latest()->paginate(config('setting.LimitPaginate'));

    }// End Attributes

    public function storeAttribute($request)
    {

        Attribute::create([
            'name'          => $request->name,
            'type_field'    => $request->type_field,
            'default_value' => $request->default_value,
            'status'        => $request->status
        ]);

    }// End StoreAttribute

    public function updateAttribute($request, $attribute)
    {

       $attribute->update([
            'name'          => $request->name,
            'type_field'    => $request->type_field,
            'default_value' => $request->default_value,
            'status'        => $request->status
       ]);

    }// End UpdateAttribute
}
