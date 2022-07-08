<?php

namespace App\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Product extends UnicodeModel
{
    use HasFactory, HasTranslations;

    protected $table = 'products';
    protected $guarded = [];
    public array $translatable = ['name', 'description'];


    public function childAttributes() :HasMany
    {
        return $this->hasMany(Product::class, 'parent_id', 'id');
    }// EndChild Product

    public function attachments() :HasMany
    {
        return $this->hasMany(ProductAttachment::class , 'product_id', 'id');
    }// End Attachments

    public function attributes() :HasMany
    {
        return $this->hasMany(ProductAttributes::class, 'product_id', 'id');
    }// End Attributes

    public function items() :HasMany
    {
        return $this->hasMany(ProductItem::class,'product_id', 'id');
    }// End Items

    public function manufacturingProcesses() :HasMany
    {
        return $this->hasMany(ProductManufacturingProcess::class ,'product_id', 'id');
    }// End ManufacturingProcesses

    public function measurement() :BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id', 'id')->select(['id', 'name']);
    }// End Measurement

    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->where('category_type', '=', 'product')
            ->select(['id', 'name']);
    }// End Category
}
