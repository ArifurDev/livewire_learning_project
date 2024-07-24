<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'sub_variant_id',
        'stock',
    ];



    //  //Search
    //  public function scopeSearch($query, $value)
    //  {
    //      $query->whereAny(
    //          [
    //              'name',
    //              'slug',
    //              'sku',
    //              'code',
    //              'description',
    //              'warranty',
    //              'price',
    //              'unit',
    //              'discount',
    //              'discountType',
    //              'status',
    //              'tags',
    //          ],
    //          'LIKE',
    //          "%$value%"
    //      );
    //  }
}
