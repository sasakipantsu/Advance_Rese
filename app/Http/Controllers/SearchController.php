<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $prefs = Area::get();
        $genres = Genre::get();
        $query = Shop::query();
        $favorite_model = new Favorite;


        if(!empty($request->area_id) && empty($request->genre_id) && empty($request->name)) {
            $shops = $query->where('area_id', $request->area_id)->paginate(10);
        }

        elseif(empty($request->area_id) && !empty($request->genre_id) && empty($request->name)) {
            $shops = Shop::with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->paginate(10);
        }

        elseif(empty($request->area_id) && empty($request->genre_id) && !empty($request->name)) {
            $shops = $query->where('name', 'LIKE', "%{$request->name}%")->paginate(10);
        }

        elseif(!empty($request->area_id) && !empty($request->genre_id) && empty($request->name)) {
            $shops = Shop::where('area_id', $request->area_id)->with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->paginate(10);
        }

        elseif(!empty($request->area_id) && empty($request->genre_id) && !empty($request->name)) {
            $shops = $query->where([
                ['area_id', $request->area_id],
                ['name', 'LIKE', "%{$request->name}%"],
            ])->paginate(10);
        }

        elseif(empty($request->area_id) && !empty($request->genre_id) && !empty($request->name)) {
            $shops = Shop::where('name', 'LIKE', "%{$request->name}%")->with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->paginate(10);
        }

        elseif(!empty($request->area_id) && !empty($request->genre_id) && !empty($request->name)) {
            $shops = Shop::where([
                ['area_id', $request->area_id],
                ['name', 'LIKE', "%{$request->name}%"],
            ])->with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->paginate(10);
        }

        else {
            $shops = Shop::paginate(10);
        }

        return view('index')->with([
            'shops' => $shops,
            'prefs' => $prefs,
            'genres' => $genres,
            'favorite_model' => $favorite_model,
        ]);
    }

}
