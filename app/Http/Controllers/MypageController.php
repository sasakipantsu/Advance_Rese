<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage()
    {
        $shops = Auth::user()->shops;

        return view('my_page', ['shops' => $shops]);
    }
}
