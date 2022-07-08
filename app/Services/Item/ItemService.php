<?php

namespace App\Services\Item;


use App\Models\Item;
use App\Services\ProductItem\ProductItemService;


class ItemService
{


    private ProductItemService $productItemService;

    public function __construct(ProductItemService  $productItemService)
    {
        $this->productItemService = $productItemService;
    }

    public function items() :object
    {
        return Item::select(['id','name', 'created_at', 'price', 'quantity', 'measurement_id', 'category_id'])
                ->mainItem()
                ->with(['category', 'measurement'])
                ->latest()
                ->paginate(config('setting.LimitPaginate'));
    } // End Items


    public function createItem() :array
    {

      return  [
            'categories'    => $this->productItemService->categories('item'),
            'attributes'    => $this->productItemService->attributes(),
            'measurements'  => $this->productItemService->measurements(),
        ];
    }// End CreateItem

    public function storeItem($request)
    {

        $item = $this->productItemService->storeBaseInformation(new Item(),$request, 'items/thumbnails',$this->productItemService->inventorSetting()->prefix_code_item);

        //Bind The Images With Item[png,jpg,jpeg,gif]
        $this->productItemService->storeAttachments($item, $request->images , 'image', 'items/images');

        //Bind The Document With Item [pdf,docx]
        $this->productItemService->storeAttachments($item, $request->documents , 'document', 'items/documents');

        //Bind The Basic Attributes With Item
        $this->productItemService->storeBasicAttributes($item, $request['attributes']);

        // Bind The Complex Attribute With Item
        $this->productItemService->storeComplexAttributes($item, $request->complex,$request->complex_attributes);


    }// End StoreItem


    public function editItem($id) :array
    {

        $item =  Item::with([
            'attachments',
            'attributes',
            'childAttributes.attributes'
        ])->findOrFail($id);

        return [
            'item' => $item,
            'categories'    => $this->productItemService->categories('item'),
            'attributes'    => $this->productItemService->attributes(),
            'measurements'  => $this->productItemService->measurements(),
        ];
    }// End Create

    public function showItem($item)
    {
        return Item::with(['attributes', 'attachments', 'category','measurement'])
                ->findOrFail($item);
    }





}
