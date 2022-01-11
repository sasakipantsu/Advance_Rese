<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index()
    {
        $prefs = Area::get();
        $genres = Genre::get();
        $shops = Shop::with('genres')->paginate(10);
        // dd($shops);
        return view('index', [
            'shops' => $shops,
            'prefs' => $prefs,
            'genres' => $genres,
        ]);
    }

    public function detail(Request $request, $shop_id)
    {
        $shop = Shop::with('genres')->findOrFail($shop_id);
        // dd($shop);
        return view('detail', ['shop' => $shop]);
    }



}
