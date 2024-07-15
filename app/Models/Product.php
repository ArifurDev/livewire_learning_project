<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'code',
        'description',
        'warranty',
        'price',
        'unit',
        'discount',
        'discountType',
        'status',
        'tags',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function subVariations()
    {
        return $this->hasMany(ProductSubVariantion::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }


    //Search
    public function scopeSearch($query, $value)
    {
        $query->whereAny(
            [
                'name',
                'slug',
                'sku',
                'code',
                'description',
                'warranty',
                'price',
                'unit',
                'discount',
                'discountType',
                'status',
                'tags',
            ],
            'LIKE',
            "%$value%"
        );
    }
}
