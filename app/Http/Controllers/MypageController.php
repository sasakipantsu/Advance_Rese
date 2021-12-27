<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function mypage()
    {
        return view('my_page');
    }
}
