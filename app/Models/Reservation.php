<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $dates = ['start_at'];

    protected $fillable = [
        'start_at',
        'total_number',
    ];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
