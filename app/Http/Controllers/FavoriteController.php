<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;


class FavoriteController extends Controller
{
    public function favorite(Shop $shop)
    {
        // dd($shop->all());
        $shop->users()->attach(Auth::id());

        return redirect('/');
    }



    public function delete(Shop $shop)
    {
        // dd($shop->all());
        $shop->users()->detach(Auth::id());

        return redirect('/');
    }
}
