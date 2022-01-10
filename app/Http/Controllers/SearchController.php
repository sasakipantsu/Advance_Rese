<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        // dd($request);
        // $shops = Shop::with('area', )
        //         ->when($request->area_id, function ($query) use ($request) {
        //             return $query->where('area_id', $request->area_id);
        //         })
                // ->when($request->genre_name, function ($query) use ($request) {
                //     return $query->where('genre_name', $request->genre_name);
                // })
                // ->when($request->product_category, function ($query) use ($request) {
                //     return $query->where('category_id', 'like', "%$request->product_category%");
                // })
                // ->paginate(20);

        // $shops = Shop::get();


        // // これをメインに考えよう

        // $query = Shop::query();

        // if (!empty($request->area_id)) {
        //     $shops = $query->where('area_id', $request->area_id)->get();
        // }

        // if (!empty($request->genre_id)) {
        //     $shops = Shop::with('genres')
        //     ->whereHas('genres', function ($query) use ($request){
        //     $query->where('genre_id', $request->genre_id);})->get();
        // }

        // if (!empty($request->name)) {
        //     $shops = $query->where('name', 'LIKE', "%{$request->name}%")->get();
        // }

        // $query = Shop::query();

        // if (!empty($request->area_id)) {
        //     $shops = $query->where('area_id', $request->area_id)->get();
        // }

        // if (!empty($request->genre_id)) {
        //     $shops = Shop::with('genres')
        //     ->whereHas('genres', function ($query) use ($request){
        //     $query->where('genre_id', $request->genre_id);})->get();
        // }

        // if (!empty($request->name)) {
        //     $shops = $query->where('name', 'LIKE', "%{$request->name}%")->get();
        // }

        // $shops = [
        //     'area_id' => $area_id,
        //     'genre_id' => $genre_id,
        //     'name' => $name,
        // ];
        // dd($shops);

        // else {
        //     $query = Shop::get();
        //     $shops = $query;
        // }


        // if (!empty($request->area_id)) {
        //     $query = Shop::query();
        //     $shops = $query->where('area_id', $request->area_id)->get();
        // }

        // elseif (!empty($request->genre_name)) {
        //     $shops = Shop::with('genres')
        //     ->whereHas('genres', function ($query) use ($request){
        //     $query->where('genre_name', $request->genre_name);})->get();
        // }

        // elseif (!empty($request->name)) {
        //     $query = Shop::query();
        //     $shops = $query->where('name', 'LIKE', "%{$request->name}%")->get();
        // }

        // else {
        //     $query = Shop::get();
        //     $shops = $query;
        // }

        // dd($shops);

        $prefs = Area::get();
        $query = Shop::query();


        if(!empty($request->area_id) && empty($request->genre_id) && empty($request->name)) {
            $shops = $query->where('area_id', $request->area_id)->get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        elseif(empty($request->area_id) && !empty($request->genre_id) && empty($request->name)) {
            $shops = Shop::with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        elseif(empty($request->area_id) && empty($request->genre_id) && !empty($request->name)) {
            $shops = $query->where('name', 'LIKE', "%{$request->name}%")->get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        elseif(!empty($request->area_id) && !empty($request->genre_id) && empty($request->name)) {
            $shops = Shop::where('area_id', $request->area_id)->with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        elseif(!empty($request->area_id) && empty($request->genre_id) && !empty($request->name)) {
            $shops = $query->where([
                ['area_id', $request->area_id],
                ['name', 'LIKE', "%{$request->name}%"],
            ])->get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        elseif(empty($request->area_id) && !empty($request->genre_id) && !empty($request->name)) {
            $shops = Shop::where('name', 'LIKE', "%{$request->name}%")->with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        elseif(!empty($request->area_id) && !empty($request->genre_id) && !empty($request->name)) {
            $shops = Shop::where([
                ['area_id', $request->area_id],
                ['name', 'LIKE', "%{$request->name}%"],
            ])->with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_id', $request->genre_id);})->get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        else {
            $shops = Shop::get();
            return view('index')->with(['shops' => $shops, 'prefs' => $prefs]);
        }

        // elseif(empty($request->area_id) && empty($request->genre_id) && empty($request->name)) {
        //     $shops = Shop::get();
        //     return view('index')->with(['shops' => $shops,]);
        // }

        // else {
        //     $message = "検索結果はありません";
        //     return view('index')->with('message',$message);
        // }


        // dd($request);

    //     $query = Shop::query();
    //     //keywordがあるかどうか。
    //     if ($request->filled('keyword')) {
    //         //検索キーワードとタイトルが一致するレコードを絞り込む
    //         $query->where('name', 'like', '%'.$request->get('keyword').'%');
    //     }

    //   //genreがあるかどうか。
    //     if ($request->filled('genre')) {
    //         //検索ジャンルとジャンル名が一致するレコードのidをgenresテーブルから取得
    //         $genre_id = Genre::where('genre_name', $request->genre_name)->first()->id;
    //         //genre_idが一致するレコードをnovelsテーブルから絞り込む
    //         $query->where('genre_id', $genre_id);
    //     }

    //     if ($request->filled('area')) {
    //         $area_id = Area::where('id', $request->area_id)->first()->id;
    //         $query->where('area_id', $area_id);
    //     }

       //条件に一致するレコードを作成日で降順に並び替えて取得
        // $shops = $query->paginate(20);

        // $shops = Shop::whereHas('genres', function ($query) use ($request){
        //     $query->where('genre_id', $request->genre_id);
        //     $query->where('area_id', $request->area_id);
        //     $query->where('name', 'LIKE', "%{$request->name}%");
        // })->paginate(20);

        // $message = "検索結果はありません。";

        // $shops = Shop::where([
        //     ['area_id', $request->area_id],
        //     ['name', 'LIKE', "%{$request->name}%"],
        // ])->get();

        // $genre_name = Shop::whereHas('genres', function ($query) use ($request){
        //     $query->where('genre_id', $request->genre_id);})->get();

        // $shops['genre_id'] = $genre_name;

        // dd($request);
        // $shops = Shop::with('genres')
        //     ->where([
        //     ['area_id', $request->area_id],
        //     ['id', $request->genre_id],
        //     ['name', 'LIKE', "%{$request->name}%"],
        //     ])
            // ->whereHas('genres', function ($query) use ($request){
            // $query->where('genre_name', $request->genre_name);})
            // ->paginate(20);

        // dd($shops);


        // return view('index', ['shops' => $shops]);
        // return view('index', ['shops' => $shops, 'message'=>$message]);
    }
}
