<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;

class ShopController extends Controller
{
    public function index()
    {
        $prefs = Area::get();
        $shops = Shop::with('genres')->get();
        // dd($shops);
        return view('index', ['shops' => $shops, 'prefs' => $prefs]);
    }

    public function detail(Request $request, $shop_id)
    {
        $shop = Shop::with('genres')->findOrFail($shop_id);
        // dd($shop);
        return view('detail', ['shop' => $shop]);
    }



}
