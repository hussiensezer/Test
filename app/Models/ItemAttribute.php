<?php

namespace App\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemAttribute extends UnicodeModel
{
    use HasFactory;

    protected $table = 'item_attributes';
    protected $guarded = [];



}
