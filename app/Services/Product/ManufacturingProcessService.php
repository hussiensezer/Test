<?php

namespace App\Services\Product;

use App\Models\ProductManufacturingProcess;
use App\Traits\FormatResponseTrait;
use Illuminate\Http\JsonResponse;

class ManufacturingProcessService
{
    use FormatResponseTrait;

    public function storeManufacturingProcess($product, $request): JsonResponse
    {
        $productService = new ProductService();
        $productService->storeProductManufacturingProcess($product, $request);
        return $this->returnSuccessMessage('Congratulation ManufacturingProcess Create Successfully');
    }// End StoreManufacturingProcess

    public function updateManufacturingProcess($product, $manufacturing, $request): JsonResponse
    {
        $manufacturing = $this->checkExistsProductManufacturingProcess($product, $manufacturing);
        if ($manufacturing) {
            $manufacturing->update([
                'manufacturing_process_id' => $request->manufacturing,
            ]);
            return $this->returnSuccessMessage('Congratulation ManufacturingProcess Updated Successfully');
        } else {
            return $this->returnError('404', 'Manufacturing Not Found');
        }

    }//End UpdateManufacturingProcess

    public function destroyManufacturingProcess($product, $manufacturing) :JsonResponse
    {
        $manufacturing = $this->checkExistsProductManufacturingProcess($product, $manufacturing);

        if ($manufacturing) {
            $manufacturing->delete();
            return $this->returnSuccessMessage('Congratulation ManufacturingProcess Deleted Successfully');
        } else {
            return $this->returnError('404', 'Manufacturing Not Found');
        }


    }// End DestroyManufacturingProcess

    private function checkExistsProductManufacturingProcess($product, $manufacturing)
    {
        return ProductManufacturingProcess::where([
            'product_id' => $product->id,
        ])->find($manufacturing);

    }// End checkExistsProductManufacturingProcess

}
