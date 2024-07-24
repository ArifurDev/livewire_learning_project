<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'status'
    ];
    //Search
    public function scopeSearch($query, $value)
    {
        $query->whereAny(
            [
                'name',
                'email',
                'status'
            ],
            'LIKE',
            "%$value%"
        );
    }
}
