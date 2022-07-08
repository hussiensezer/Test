<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryTransaction extends Model
{
    use HasFactory;

    protected $table = 'inventory_transactions';
    protected $guarded = [];


    public function item() :BelongsTo
    {
       return $this->belongsTo(Item::class, 'item_id', 'id');
    }// End Item

    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }// End Product

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }// End User
}
