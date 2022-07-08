<?php

namespace App\Models;

use App\Abstracts\UnicodeModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Translatable\HasTranslations;


class Category extends UnicodeModel
{
    use HasFactory, HasTranslations;

    protected $table = 'categories';
    protected $guarded = [];
    public $translatable = ['name', 'description'];

    public function parentCategory():BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->select(['id', 'name']);
    }// End ParentCategory


    public function childCategories():hasMany
    {
        return $this->hasMany(Category::class, 'parent_id','id');
    }// End Child Categories



    public function items() :hasMany
    {
        return  $this->hasMany(Item::class, 'category_id','id');
    }//
    public  function scopeParent($query)
    {
        $query->whereNull('parent_id');
    }// End Scope Parent

    public function scopeChild($query)
    {
        $query->WhereNotNull('parent_id');
    }

    public function scopeType($query, string $type)
    {
        $query->where('category_type', $type);
    }// End Scope Category

    public function getCreatedAtAttribute($value): string
    {
        return   Carbon::parse($value)->format('d/m/Y');
    }


}
