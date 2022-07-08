<?php

namespace App\Services\ProductItem;

use App\Models\ItemAttribute;
use App\Models\ProductAttributes;
use App\Traits\FormatResponseTrait;
use Illuminate\Http\JsonResponse;

class AttributeService
{

    use FormatResponseTrait;

    public function storeAttribute($model, $attributes): JsonResponse
    {
        $productItemServices = new  ProductItemService();
        $productItemServices->storeBasicAttributes($model, $attributes);
        return $this->returnSuccessMessage('Congratulation Attributes Created Successfully');
    }// End StoreAttribute

    /*
     *---------------------------------------------------------
     * Item Attribute [Update-Destroy-Check]
     *---------------------------------------------------------
     */

    public function updateItemAttribute($item,$attribute,$request) :JsonResponse
    {
        $attribute = $this->checkExitsItemAttribute($item,$attribute);
        if ($attribute) {
            $attribute->update([
                'attribute_id' => $request->attribute,
                'value'        => implode('/', $request->value),
            ]);
            return $this->returnSuccessMessage('Congratulation Attribute Updated Successfully');
        } else {
            return $this->returnError('404', 'Attribute Not Found');
        }
    }// End UpdateAttribute


    public function destroyItemAttribute($item,$attribute) :JsonResponse
    {
        $itemAttribute = $this->checkExitsItemAttribute($item,$attribute);
        if ($itemAttribute) {
            $itemAttribute->delete();
            return $this->returnSuccessMessage('Congratulation Attribute Delete Successfully');
        } else {
            return $this->returnError('404', 'Attribute Not Found');
        }
    }// DestroyItemAttribute

    private function checkExitsItemAttribute($item, $attribute)
    {
        return ItemAttribute::where('item_id', $item->id)->find($attribute);
    }// End CheckExistsItemAttribute

    /*
    *---------------------------------------------------------
    * Product Attribute [Update-Destroy-Check]
    *---------------------------------------------------------
    */

    public function updateProductAttribute($product,$attribute,$request) :JsonResponse
    {
        $attribute = $this->checkExitsItemAttribute($product,$attribute);
        if ($attribute) {
            $attribute->update([
                'attribute_id' => $request->attribute,
                'value'        => implode('/', $request->value),
            ]);
            return $this->returnSuccessMessage('Congratulation Attribute Updated Successfully');
        } else {
            return $this->returnError('404', 'Attribute Not Found');
        }
    }// End UpdateAttribute

    public function destroyProductAttribute($item,$attribute) :JsonResponse
    {
        $productAttribute = $this->checkExistsProductAttribute($item,$attribute);
        if ($productAttribute) {
            $productAttribute->delete();
            return $this->returnSuccessMessage('Congratulation Attribute Delete Successfully');
        } else {
            return $this->returnError('404', 'Attribute Not Found');
        }
    }// DestroyItemAttribute


    private function checkExistsProductAttribute($product,$attribute)
    {
        return ProductAttributes::where('product_id', $product->id)->find($attribute);
    }// End CheckExistsProductAttribute
}
