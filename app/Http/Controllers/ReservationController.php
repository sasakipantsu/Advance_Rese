<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function reservation(ReservationRequest $request)
    {
        dd($request);
        $reservation = new Reservation();
        $reservation->user_id = auth()->id();
        $reservation->shop_id = $request->shop_id;
        $reservation->start_at = $request->start_at;
        $reservation->total_number = $request->total_number;
        $reservation->save();

        return view('done');
    }
}
