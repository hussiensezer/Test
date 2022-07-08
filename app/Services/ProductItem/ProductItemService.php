<?php

namespace App\Services\ProductItem;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\InventorySetting;
use App\Models\Measurement;
use App\Traits\MediaTrait;

class ProductItemService
{

    use MediaTrait;
    public function storeBaseInformation ($model,$request, $thumbnailDirectory,$code)
    {
        $categories = $request->category;

        $model->name = $request->name;
        $model->description = $request->description;
        $model->category_id =end($categories);
        $model->bar_code_scanner = $request->bar_code_scanner;
        $model->price = $request->price;
        $model->quantity = $request->quantity;
        $model->alert_limit = $request->alert_limit ? $request->alert_limit : $this->inventorSetting()->limit_alert;
        $model->measurement_id = $request->measurement;

        $model->save();

        $model->update([
            'image' => $this->storeMedia($request->thumbnail,'files', $thumbnailDirectory),

            // Check if the Request Has CodeItem Input will or will generate Auto Code
            'code' => $request->filled('code') ? $request->code : $code .'-' . $model->id,
        ]);

        return $model;


    } //End StoreBaseInformation

    public function storeAttachments($model,$attachments, $type, $directory) {

       if(is_array($attachments)){

           foreach($attachments as $attachment) {
               $model->attachments()->create([
                   'path'  => $this->storeMedia($attachment , 'files',  $directory),
                   'type'  => $type
               ]);
           }// End Foreach

       }// End If Condition

    }// End StoreImageAttachment

    public function storeBasicAttributes($model,$attributes)
    {
        if (is_array($attributes)) {

            foreach ($attributes as $attribute) {

                $model->attributes()->create([
                    'attribute_id' => $attribute['attribute'],
                    'value'        => implode('/', $attribute['value']),
                ]);

            }// End Foreach

        }// End If Condition


    }// End Store BasicAttributes

    public function storeComplexAttributes($model,$attributes,$complexAttributes) {

        $complexArrayWithValue = [];
        if(is_array($attributes)) {

            foreach($attributes as $i =>   $attribute) {

                // Check Create Child Complex Attribute Item Of Main Item
                $child = $model->childAttributes()->create([

                    'attributes'    => implode('/', $attribute['values']),
                    'price'         => $attribute['price'],
                    'quantity'      => $attribute['quantity'],

                ]);

                /*
                     *  Push The Attribute ID As Key and The Value As Value
                     *  Like [1 => red, 2=> small] , [1 => green , 2 => xl]
                */
                $complexArrayWithValue[] = array_combine($complexAttributes, $attribute['values']);

                //Looping Into ComplexArrayWith Value Then Create Attribute And Bind With Child Item
                foreach($complexArrayWithValue[$i] as $attributeId =>  $value) {

                    $child->attributes()->create([
                        'attribute_id'  => $attributeId,
                        'value'         => implode('/',array($value))
                    ]);
                }//End Loop ComplexArrayWithValue

            }// End Loop Attributes

        }// End If Condition

    }// End Store ComplexAttributes


    public function categories ($type)
    {

        return Category::select(['id','name'])
            ->parent()
            ->type($type)
            ->get();
    }// End Categories

    public function attributes()
    {
        return Attribute::select(['id','name', 'type_field', 'default_value'])
            ->active()
            ->get();
    }// End Attribute

    public function measurements() {

        return Measurement::select(['id','name'])
            ->active()
            ->get();
    }// End Measurements

    public function inventorSetting()
    {
        return InventorySetting::first();
    }// End InventorSetting
}
