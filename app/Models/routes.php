<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url'
    ];

     //Search
     public function scopeSearch($query, $value)
     {
         $query->whereAny(
             [
                 'name',
                 'url',
             ],
             'LIKE',
             "%$value%"
         );
     }
}
