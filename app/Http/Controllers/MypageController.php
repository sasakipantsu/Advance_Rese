<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Shop;



class MypageController extends Controller
{
    public function mypage()
    {
        $my_reservations = Reservation::where('user_id', Auth::id())->get();
        $shops = Auth::user()->shops;
        // dd($my_reservations);

        return view('my_page', ['shops' => $shops, 'my_reservations' => $my_reservations]);
    }
}
