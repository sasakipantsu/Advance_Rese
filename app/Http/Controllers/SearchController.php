<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Models\Shop;
// use App\Models\Area;
use App\Models\Genre;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // dd($request);
        $shops = Shop::with('genres')
            ->where([
            ['area_id', $request->area_id],
            // ['genre_name', $request->genre_name],
            ['name', 'LIKE', "%{$request->name}%"],
            ])->paginate(20);

            // Genre::where('genre_name', $request->genre_name)->paginate(20);
        // dd($shops);

        return view('index', ['shops' => $shops]);
    }
}
