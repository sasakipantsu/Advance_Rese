<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // public function shop()
    // {
    //     return $this->belongsTo('App\Models\Shop');
    // }

    // public function genre()
    // {
    //     return $this->belongsTo('App\Models\Genre');
    // }
}
