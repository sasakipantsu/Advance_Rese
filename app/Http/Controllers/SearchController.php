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


        // これをメインに考えよう
        if (!empty($request->area_id)) {
            $query = Shop::query();
            $shops = $query->where('area_id', $request->area_id)->get();
        } else {
            $query = Shop::get();
            $shops = $query;
        }

        if (!empty($request->genre_name)) {
            $shops = Shop::with('genres')
            ->whereHas('genres', function ($query) use ($request){
            $query->where('genre_name', $request->genre_name);})->get();
        } else {
            $query = Shop::get();
            $shops = $query;
        }

        if (!empty($request->name)) {
            $query = Shop::query();
            $shops = $query->where('name', 'LIKE', "%{$request->name}%")->get();
        } else {
            $query = Shop::get();
            $shops = $query;
        }



        // if(!empty($request->name) && empty($request->genre_name) && empty($request->area_id)) {
        //     $query = Shop::query();
        //     $shops = $query->where('name','like', '%' .$request->name. '%')->get();
        //     return view('index')->with(['shops' => $shops,]);
        // }

        // elseif(empty($request->name) && !empty($request->genre_name) && empty($request->area_id)) {
        //     $query = Genre::query();
        //     $shops = $query->where('name', $request->genre_name)->get();
        //     return view('index')->with(['shops' => $shops,]);
        // }

        // elseif(empty($request->name) && empty($request->genre_name) && !empty($request->area_id)) {
        //     $query = Area::query();
        //     $shops = $query->where('name', $request->area_id)->get();
        //     return view('index')->with(['shops' => $shops,]);
        // }

        // else {
        //     $message = "検索結果はありません。";
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
        //     $query->where('genre_name', $request->genre_name);
        //     $query->where('area_id', $request->area_id);
        //     $query->where('name', 'LIKE', "%{$request->name}%");
        // })->paginate(20);

        // $message = "検索結果はありません。";



        // dd($request);
        // $shops = Shop::with('genres')
        //     ->where([
        //     ['area_id', $request->area_id],
        //     ['genre_name', $request->genre_name],
        //     ['name', 'LIKE', "%{$request->name}%"],
        //     ])
        //     ->whereHas('genres', function ($query) use ($request){
        //     $query->where('genre_name', $request->genre_name);})
        //     ->paginate(20);

        // dd($shops);

        return view('index', ['shops' => $shops]);
        // return view('index', ['shops' => $shops, 'message'=>$message]);
    }
}
