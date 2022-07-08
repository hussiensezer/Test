<?php

namespace App\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Measurement extends UnicodeModel
{
    use HasFactory, HasTranslations;

    protected $table = 'measurements';
    protected $guarded = [];
    public array $translatable = ['name'];

    public function scopeActive($query) {
        $query->where('status' , 1);
    }// End Active
}
