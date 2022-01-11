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
        
        $my_reservations = Reservation::where('user_id', Auth::id())->paginate(2, ["*"], 'reservationpage');
        $shops = Auth::user()->shops()->paginate(6, ["*"], 'shoppage');

        // if ($my_reservations === 0){
        //     return redirect('mypage')->with('flash_message', '君たち付き合っちゃいなよ！！');
        // }
        // dd($my_reservations);

        return view('my_page', ['shops' => $shops, 'my_reservations' => $my_reservations]);
    }

    public function delete(Request $request)
    {
        $my_reservations = Reservation::find($request->id);
        $my_reservations->delete();

        return redirect('mypage');
    }

    public function mypage_delete(Shop $shop)
    {
        // dd($shop->all());
        $shop->users()->detach(Auth::id());

        return redirect('mypage');
    }
}
