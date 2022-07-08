<?php

namespace App\Services\Inventory;

use App\Models\InventoryTransaction;
use App\Services\ProductItem\ProductItemService;
use App\Traits\FormatResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class InventoryTransactionService
{
    use FormatResponseTrait;

    public function Withdraw($request, $model, $parentModel, $productId, $itemId): JsonResponse
    {
        //If Manual Withdrew Available Or Not
        //If Quantity less than or equal
        //Store InventoryTransaction
        //Update Main Model Quantity
        //Update Parent Model Quantity

        DB::beginTransaction();
        //If Manual Withdrew Available Or Not
        if ($this->checkManualWithdrew()) {

            //If Quantity less than or equal
            if ($this->checkQuantity($model, $request->quantity)) {

                //Store InventoryTransaction
                $this->storeInventoryTransaction(
                    'Withdrew',
                    $model->quantity,
                    $this->calculatorCase($model, '-', $request->quantity),
                    $productId,
                    $itemId

                );
                //Update Main Model Quantity
                $this->updateQuantity($model, '-', $request->quantity);

                //Update Parent Model Quantity
                $this->updateQuantity($parentModel, '-', $request->quantity);

                DB::commit();
                return $this->returnSuccessMessage("Congratulation Withdrew Transaction  Successfully");

            } else {
                DB::rollback();
                return $this->returnError('', 'You Cannot Withdrew Transaction Because Quantity Less Then Withdrew Quantity');

            }// End CheckQuantity
        } else {
            return $this->returnError('', 'You Cannot Withdrew Transaction Right Now. Change it From Inventory Setting');

        }// End Check ManualWithdrew

    }// End Withdrew

    public function deposit($request, $model, $parentModel, $productId, $itemId)
    {
        //Store InventoryTransaction
        $this->storeInventoryTransaction(
            'Deposit',
            $model->quantity,
            $this->calculatorCase($model, '+', $request->quantity),
            $productId, $itemId
        );

        //Update Main Model Quantity
        $this->updateQuantity($model, '+', $request->quantity);

        //Update Parent Model Quantity
        $this->updateQuantity($parentModel, '+', $request->quantity);

    }// End Deposit


    private function updateQuantity($model, $operation, $quantity)
    {
        if ($model)
            $model->update([
                'quantity' => $this->calculatorCase($model, $operation, $quantity),
            ]);

    }// End updateParentItem


    private function checkManualWithdrew(): bool
    {
        return (bool)(new ProductItemService())->inventorSetting()->manual_withdraw;

    }//checkManualWithdrew

    private function calculatorCase($model, $operation, $quantity)
    {

        switch ($operation) {
            case "-":
                return ($model->quantity - $quantity);
                break;

            case "+":
                return ($quantity + $model->quantity);
                break;
            default:
                return false;
        }// End Switch
    }//End calculatorCase

    private function storeInventoryTransaction($status, $before, $after, $product = NULL, $item = NULL)
    {
        InventoryTransaction::create([
            'product_id' => $product,
            'item_id' => $item,
            'status' => $status,
            'before_count' => $before,
            'after_count' => $after,
            'user_id' => auth()->user()->id,
        ]);
    }// End storeInventoryTransaction

    private function checkQuantity($model, $quantity): bool
    {
        if (intval($quantity) <= intval($model->quantity)) {
            return true;
        } else {
            return false;
        }
    }// End Check Quantity
}
