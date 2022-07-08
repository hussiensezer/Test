<?php

namespace App\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Attribute extends UnicodeModel
{
    use HasFactory,HasTranslations;

    protected $table = 'attributes';
    protected $guarded = [];
    public $translatable = ['name'];
    protected $casts = [
        'default_value' => 'array'
    ];

    public function scopeActive($query)
    {
        $query->where('status', 1);
    }

}
