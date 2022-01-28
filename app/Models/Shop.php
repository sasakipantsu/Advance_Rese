<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Blog\Models\Shop_user;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'introduction',
        'img_url',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
