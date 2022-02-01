<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
    ];

    protected $table = 'shop_user';


    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    // public function shop()
    // {
    //     return $this->belongsTo(Shop::class);
    // }
    //いいねが既にされているかを確認
    public function favorite_exist($id, $shop_id)
    {
        $exist = Favorite::where('user_id', $id)->where('shop_id', $shop_id)->get();

        // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }

}

