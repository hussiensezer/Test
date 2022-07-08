<?php

namespace App\Services\ProductItem;

use App\Traits\MediaTrait;

class BaseInformationService
{
    use MediaTrait;
    public function updateBaseInformation($model, $request,$thumbnailDirectory,$code) {

       $categories = $request->category;

       $model->update([
       "name"               => $request->name,
       "description"        => $request->description,
       "category_id"        => end($categories),
       "bar_code_scanner"   => $request->bar_code_scanner,
       "price"              => $request->price,
       "quantity"           => $request->quantity,
       "alert_limit"        => $request->alert_limit ? $request->alert_limit : (new ProductItemService())->inventorSetting()->limit_alert,
       "measurement_id"     => $request->measurement,
        ]);

       if($request->hasFile('thumbnail'))
       {
           // delete the thumbnail from files then update with new one
        $this->deleteMedia('files', $thumbnailDirectory, $model->image);
        $model->update([
            'image' => $this->storeMedia($request->thumbnail,'files', $thumbnailDirectory),

            // Check if the Request Has CodeItem Input will or will generate Auto Code
            'code' => $request->filled('code') ? $request->code : $code .'-' . $model->id,
        ]);
       }// End If Condition
    }// End Update BaseInformation
}
