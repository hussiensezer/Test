<?php

namespace App\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Item extends UnicodeModel
{
    use HasFactory, HasTranslations;

    protected $table = 'items';
    protected $guarded = [];
    public array $translatable = ['name','description'];


    public function childAttributes() :HasMany
    {
        return $this->hasMany(Item::class, 'parent_id', 'id');
    }// EndChild Items
    public function attributes() :HasMany
    {
        return $this->hasMany(ItemAttribute::class, 'item_id', 'id');
    }// End Attribute

    public function attachments() :HasMany
    {
        return $this->hasMany(ItemAttachment::class, 'item_id', 'id');
    }// End Attachments

    public function measurement() :BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id', 'id')->select(['id', 'name']);
    }// End Measurement

    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->where('category_type', '=', 'item');

    }// End Category
    public function scopeMainItem($query)
    {
        $query->whereNull('parent_id');
    }// End MainItem
}
