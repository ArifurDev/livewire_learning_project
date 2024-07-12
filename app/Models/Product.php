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
        'discount_type',
        'status',
        'tags',
    ];
}
