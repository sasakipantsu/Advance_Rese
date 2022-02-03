<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\Favorite;



class MypageController extends Controller
{
    public function mypage()
    {

        $my_reservations = Reservation::where('user_id', Auth::id())->paginate(2, ["*"], 'reservationpage');
        $shops = Auth::user()->shops()->paginate(6, ["*"], 'shoppage');
        $favorite_model = new Favorite;

        return view('my_page', [
            'shops' => $shops,
            'my_reservations' => $my_reservations,
            'favorite_model' => $favorite_model,
        ]);
    }

    public function reservation_delete(Request $request)
    {
        $my_reservations = Reservation::find($request->id);
        $my_reservations->delete();

        return redirect('mypage');
    }
}
