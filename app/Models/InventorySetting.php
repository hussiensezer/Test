<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySetting extends Model
{
    use HasFactory;
    protected $table = 'inventory_settings';
    protected $guarded = [];
}
