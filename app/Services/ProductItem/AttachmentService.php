<?php

namespace App\Services\ProductItem;

use App\Models\ItemAttachment;
use App\Models\ProductAttachment;
use App\Traits\MediaTrait;
use App\Traits\FormatResponseTrait;
use Illuminate\Http\JsonResponse;

class AttachmentService
{
    use MediaTrait, FormatResponseTrait;

    public function store($request, $model, $type, $directory): JsonResponse
    {
        $attachments = new ProductItemService();

        $attachments->storeAttachments($model, $request, $type, $directory);
        return $this->returnSuccessMessage('Congratulation Attachment Created Successfully');
    }// End Store

    /*
     * --------------------------------------
     * Product [Destroy,Check]
     * --------------------------------------
     */
    public function destroyProductAttachment($product, $directory, $attachment, $type): JsonResponse
    {
        $productAttachment = $this->checkExitsProductAttachment($product, $attachment, $type);

        if ($productAttachment) {
            $this->deleteMedia('files', $directory, $product->path);
            $product->delete();
            return $this->returnSuccessMessage('Congratulation Attachment Delete Successfully');
        } else {
            return $this->returnError('404', 'Attachment Not Found');
        }


    }// End Destroy

    private function checkExitsProductAttachment($product, $attachment, $type)
    {
        return ProductAttachment::where([
            ['product', $product->id],
            ['type', $type]
        ])->find($attachment);

    }

    /*
    * --------------------------------------
    * Item [Destroy,Check]
    * --------------------------------------
    */
    public function destroyItemAttachment($item, $directory, $attachment, $type): JsonResponse
    {
        $itemAttachment = $this->checkExitsItemAttachment($item, $attachment, $type);

        if ($itemAttachment) {
            $this->deleteMedia('files', $directory, $item->path);
            $item->delete();
            return $this->returnSuccessMessage('Congratulation Attachment Delete Successfully');
        } else {
            return $this->returnError('404', 'Attachment Not Found');
        }
    }// End Destroy

    private function checkExitsItemAttachment($item, $attachment, $type)
    {
        return ItemAttachment::where([
            ['item_id', $item->id],
            ['type', $type]
        ])->find($attachment);
    }

}
