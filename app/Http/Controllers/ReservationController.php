<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
        $start_at = $request->date . $request->time;
        $reservation = new Reservation();
        $reservation->user_id = auth()->id();
        $reservation->shop_id = $request->shop_id;
        $reservation->start_at = $start_at;
        $reservation->total_number = $request->total_number;
        $reservation->save();

        $request->session()->regenerateToken();

        return view('done');
    }
}
