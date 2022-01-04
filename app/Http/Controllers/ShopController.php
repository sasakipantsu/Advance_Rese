<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        // ShopModel::search(new ShopSearch())->where('example', 'test');
        $shops = Shop::with('genres')->get();
        // dd($shops);
        return view('index', ['shops' => $shops]);
    }

    public function detail(Request $request, $shop_id)
    {
        $shop = Shop::with('genres')->findOrFail($shop_id);
        // dd($shop);
        return view('detail', ['shop' => $shop]);
    }



}
