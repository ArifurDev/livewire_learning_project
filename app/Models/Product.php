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
        'images',
        'warranty',
        'price',
        'unit',
        'discount',
        'discount_type',
        'categories_id',
        'status',
        'tags',
    ];
}
