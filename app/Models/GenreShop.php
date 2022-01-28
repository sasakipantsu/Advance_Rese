<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'genre_id',
    ];

}
