<?php

namespace App\Services\Product;

use App\Models\ManufacturingProcess;
use App\Models\Product;
use App\Services\ProductItem\ProductItemService;

class ProductService
{

    public function products()
    {
        return Product::select([
            'id', 'name' , 'description', 'price', 'quantity','measurement_id', 'category_id', 'created_at',
            ])->with(['category', 'measurement'])
            ->latest()
            ->paginate(config('setting.LimitPaginate'));
    }// End Products

    public function createProduct() :array
    {
        $productItemService = new ProductItemService();
        return [
            'categories'                => $productItemService->categories('product'),
            'attributes'                => $productItemService->attributes(),
            'measurements'              => $productItemService->measurements(),
            'manufacturing_processes'   => $productItemService->manufacturingProcesses()
        ];
    }

    public function storeProduct($request)
    {

        $productItemService = new ProductItemService();
        $product = $productItemService->storeBaseInformation(new Product(),$request, 'products/thumbnails',$productItemService->inventorSetting()->prefix_code_product);

        //Bind The Images With Item[png,jpg,jpeg,gif]
        $productItemService->storeAttachments($product, $request->images , 'image', 'products/images');

        //Bind The Document With Item [pdf,docx]
        $productItemService->storeAttachments($product, $request->documents , 'document', 'products/documents');

        //Bind The Basic Attributes With Item
        $productItemService->storeBasicAttributes($product, $request['attributes']);

        // Bind The Complex Attribute With Item
        $productItemService->storeComplexAttributes($product, $request->complex,$request->complex_attributes);

        //Bind The Manufacturing Processes With Product
        $this->storeProductManufacturingProcess($product,$request->manufacturing_process );

        //Bind The Items With Product
        $this->storeProductItems($product, $request->items);

    }// End Store

    public function editProduct($id) :array
    {
        $productItemService = new ProductItemService();
        $product = Product::with([
            'attachments',
            'attributes',
            'childProductAttributes.attributes',
            'manufacturingProcesses'
        ])->findOrFail($id);

        return [
            'product' => $product,
            'categories'    => $productItemService->categories(),
            'attributes'    => $productItemService->attributes(),
            'measurements'  => $productItemService->measurements(),
            'manufacturing_processes'   => $this->manufacturingProcesses()
        ];
    }// End editProduct

    public function showProduct($id)
    {
        return Product::with([
            'attachments',
            'attributes',
            'childProductAttributes.attributes',
            'manufacturingProcesses'
        ])->findOrFail($id);
    }// End Show Product

    private function manufacturingProcesses()
    {
        return ManufacturingProcess::active()->get();
    }// End ManufacturingProcesses




    public function storeProductManufacturingProcess($product,$manufacturingProcesses)
    {
        if(is_array($manufacturingProcesses))
        {

            foreach($manufacturingProcesses as $manufacturingProcess)
            {
                $product->manufacturingProcesses()->create([
                    'manufacturing_process_id'  => $manufacturingProcess['manufacturing'],
                ]);
            }//End Foreach

        }//End If Condition

    }// End Store ManufacturingProcess

    public function storeProductItems($product, $items)
    {
        if(is_array($items))
        {
            foreach($items as $item)
            {
                $product->items()->create([
                    'item_id'   => $item['item'],
                    'value'     => $item['value']
                ]);

            }// End Foreach

        }// End If Condition

    }// End StoreProductItems


}
