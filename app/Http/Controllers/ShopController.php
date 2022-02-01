<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;


class ShopController extends Controller
{
    public function index()
    {
        $prefs = Area::get();
        $genres = Genre::get();
        $shops = Shop::with('genres')->paginate(10);

        $favorite_model = new Favorite;
        $data = [
            'shops' => $shops,
            'prefs' => $prefs,
            'genres' => $genres,
            'favorite_model' => $favorite_model,
        ];
        // dd($shops);
        return view('index', $data);
    }

    public function detail(Request $request, $shop_id)
    {
        $shop = Shop::with('genres')->findOrFail($shop_id);
        // dd($shop);
        return view('detail', ['shop' => $shop]);
    }



}
