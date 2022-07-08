<?php

namespace App\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class ManufacturingProcess extends UnicodeModel
{
    use HasFactory, HasTranslations;

    protected $table = 'manufacturing_processes';
    protected $guarded = [];
    public $translatable = ['name'];


    public function scopeActive($query)
    {
        $query->where('status', 1);
    }// End Scope Active
}
