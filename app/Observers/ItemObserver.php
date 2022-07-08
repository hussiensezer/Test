<?php

namespace App\Observers;

use App\Models\Item;

class ItemObserver
{
    /**
     * Handle the Item "created" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function created(Item $item)
    {
//        if(request()->has('code_item')) {
//
//            $item->code_item = request()->code_item;
//            $item->save();
//        }elseif(empty(request()->code_item)) {
//            $item->code_item = 'IT-' . $item->id;
//            $item->save();
//        }
    }

    /**
     * Handle the Item "updated" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function updated(Item $item)
    {
        //
    }

    /**
     * Handle the Item "deleted" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function deleted(Item $item)
    {
        //
    }

    /**
     * Handle the Item "restored" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function restored(Item $item)
    {
        //
    }

    /**
     * Handle the Item "force deleted" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function forceDeleted(Item $item)
    {
        //
    }
}
