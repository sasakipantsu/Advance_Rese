<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function reservation(ReservationRequest $request)
    {

        // $reservation = new Reservation();
        // $reservation->user_id = auth()->id();
        // $reservation->shop_id = $request->shop_id;
        // $reservation->starts_at = $request->date. ' '. $request->time;
        // Reservation::create($reservation);
        // $result = $reservation->save();
        // dd($reservation);


        // $users = Auth::user();
        $user_id = auth()->id();
        $shop_id = $request->id;
        $start_at = $request->date. ' '. $request->time;
        $request['start_at'] = $start_at;
        $request['user_id'] = $user_id;
        $request['shop_id'] = $shop_id;
        $schedule = $request->all();
        // dd($schedule);
        Reservation::create($schedule);
        return view('done');
    }
}
