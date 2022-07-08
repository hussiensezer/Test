<?php

namespace App\Services\Product;

use App\Models\ProductItem;
use App\Traits\FormatResponseTrait;
use Illuminate\Http\JsonResponse;

class ItemService
{
    use FormatResponseTrait;

    public function storeProductItem($product, $items): JsonResponse
    {
        $productService = new ProductService();

        $productService->storeProductItems($product, $items);

        return $this->returnSuccessMessage('Congratulation ProductItem Created Successfully');
    }//End Store ProductItem


    public function updateProductItem($request, $product, $productItemId): JsonResponse
    {
        $productItem = $this->CheckExistsProductItem($product, $productItemId);

        if ($productItem) {
            $productItem->update([
                'item_id'   => $request->item,
                'value'     => $request->value
            ]);
            return $this->returnSuccessMessage('Congratulation ProductItem Updated Successfully');
        } else {
            return $this->returnError('404', 'Product Item Not Found');
        }
    }// End UpdateProductItem

    public function destroyProductItem($product, $productItemId) :JsonResponse
    {
        $productItem = $this->CheckExistsProductItem($product, $productItemId);
        if ($productItem) {
            $productItem->delete();
            return $this->returnSuccessMessage('Congratulation ProductItem Deleted Successfully');
        } else {
            return $this->returnError('404', 'Product Item Not Found');
        }
    }// End destroyProductItem

    private function CheckExistsProductItem($product, $productItemId)
    {
        return ProductItem::where([
            'product_id' => $product->id
        ])->find($productItemId);
    }// End CheckExistsProductItem

}
