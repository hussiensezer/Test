<?php

namespace App\Services\ProductItem;

use App\Models\Item;
use App\Traits\FormatResponseTrait;
use Illuminate\Http\JsonResponse;

class ComplexAttributeService
{
    use FormatResponseTrait;
    public function storeComplexAttribute($model,$attributes, $complexAttributes) :JsonResponse
    {
        $productItemComplexAttribute = new ProductItemService();

        $productItemComplexAttribute->storeComplexAttributes($model,$attributes,$complexAttributes);
        return $this->returnSuccessMessage('Congratulation Complex Attributes Created Successfully');

    }// End StoreComplexAttribute
    /*
     *---------------------------------------------------------
     * Item [Destroy,CheckExists]
     *---------------------------------------------------------
     */
    public function destroyItemComplexAttribute($item,$complexAttribute) :JsonResponse
    {
        $complexAttributeItem =  $this->checkExistsItemComplexAttribute($item, $complexAttribute);
        if($complexAttributeItem)
        {
            $complexAttributeItem->attributes()->delete();
            $complexAttributeItem->delete();
            return $this->returnSuccessMessage('Congratulation Attribute Delete Successfully');
        }else {
            return $this->returnError('404', 'Complex Attribute Not Found');
        }
    }

    private function checkExistsItemComplexAttribute($item,$complexAttribute)
    {
        return Item::where('parent_id',$item->id)->find($complexAttribute);
    }

    /*
     *---------------------------------------------------------
     * Product [Destroy,CheckExists]
     *---------------------------------------------------------
     */

    public function destroyProductComplexAttribute($product,$complexAttribute) :JsonResponse
    {
        $complexAttributeProduct =  $this->checkExistsProductComplexAttribute($product, $complexAttribute);
        if($complexAttributeProduct)
        {
            $complexAttributeProduct->attributes()->delete();
            $complexAttributeProduct->delete();
            return $this->returnSuccessMessage('Congratulation Attribute Delete Successfully');
        }else {
            return $this->returnError('404', 'Complex Attribute Not Found');
        }
    }

    private function checkExistsProductComplexAttribute($item,$complexAttribute)
    {
        return Item::where('parent_id',$item->id)->find($complexAttribute);
    }
}
