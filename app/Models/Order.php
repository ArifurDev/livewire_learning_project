<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'total_products',
        'sub_total',
        'vat',
        'total',
        'pay',
        'due',
        'payment_status',
        'shiping_charge',
        'order_status'
    ];


    //Search
    public function scopeSearch($query, $value)
    {
        $query->whereAny(
            [
                'id',
                'total_products',
                'sub_total',
                'vat',
                'total',
                'pay',
                'due',
                'payment_status',
                'shiping_charge',
                'order_status',
                'created_at',
                'updated_at'
            ],
            'LIKE',
            "%$value%"
        );
    }
}
