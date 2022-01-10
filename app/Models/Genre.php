<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function genre_shops()
    {
        return $this->belongsToMany(Shop::class)->withTimestamps();
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
