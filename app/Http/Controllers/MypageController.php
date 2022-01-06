<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage()
    {
        $shops = Shop::with('genres')->get();

        // $shops = Shop::where('user_id', \Auth::user()->id)
        //                     ->whereIn('to_user_id', $likedUserIds)
        //                     ->where('is_like', true)
        //                     // N+1問題回避のためにcontrollerにこの記述をする
        //                     ->with('toUser')
        //                     ->get();

        return view('my_page', ['shops' => $shops]);
    }
}
