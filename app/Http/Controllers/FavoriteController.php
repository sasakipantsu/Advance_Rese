<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Favorite;


class FavoriteController extends Controller
{
    public function ajax_favorite(Request $request)
    {
        $id = Auth::user()->id;
        $shop_id = $request->shop_id;
        $favorite = new Favorite;
        $shop = Shop::findOrFail($shop_id);

        if ($favorite->favorite_exist($id, $shop_id)) {
            $favorite = Favorite::where('shop_id', $shop_id)->where('user_id', $id)->delete();
        } else {
            $favorite = new Favorite;
            $favorite->shop_id = $request->shop_id;
            $favorite->user_id = Auth::user()->id;
            $favorite->save();
        }
    }
}
