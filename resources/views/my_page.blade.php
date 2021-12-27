@extends('layouts.default')

@section('title', 'マイページ - Rese')

@section('content')

    {{-- ロゴ --}}
    <div class="pl-28 mt-10">
        <a href="/" class="text-white flex space-x-2 mb-2">
            <svg class="h-8 w-8 rounded shadow-md bg-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
            <span class="text-2xl font-extrabold text-blue-600">Rese</span>
        </a>
    </div>

    <div class="px-32 flex justify-between">

        {{-- 予約状況 --}}
        <div class="w-2/6">

            <h2 class="font-bold pb-4 pt-20">予約状況</h2>

            <div class="py-6 px-5 text-sm bg-blue-600 text-white rounded shadow-md">

                <div class="h-10 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <p class="pl-3">予約1</p>
                </div>

                <table class="text-left">
                    <tr class="h-8">
                        <th class="w-1/3">Shop</th>
                        <td class="pl-8">仙人</td>
                    </tr>
                    <tr class="h-8">
                        <th class="w-1/3"> Date</th>
                        <td class="pl-8">仮１</td>
                    </tr>
                    <tr class="h-8">
                        <th class="w-1/3"> Time</th>
                        <td class="pl-8">仮１</td>
                    </tr>
                    <tr class="h-8">
                        <th class="w-1/3"> Number</th>
                        <td class="pl-8">仮１</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- お気に入り店舗 --}}
        <div class="w-3/5">
            <h2 class="text-2xl font-bold py-4">testさん</h2>
            <h2 class="font-bold py-4">お気に入り店舗</h2>

            <div class="flex justify-evenly flex-wrap">

                <div class="w-56 shadow-md mb-5">
                    <div>
                        <img src="/storage/img/sushi.jpg" alt="サンプル画像" class="w-full h-32 rounded-t-lg">
                    </div>
                    <div class="p-4 bg-white rounded-b-lg">
                        <h2 class="font-bold pb-2">仙人</h2>
                        <p class="text-xs pb-3">#東京都 #寿司</p>
                        <button class="text-xs bg-blue-600 text-white px-5 py-1 rounded transition duration-200 hover:bg-blue-400"><a href="">詳しく見る</a></button>
                    </div>
                </div>

                <div class="w-56 shadow-md mb-5">
                    <div>
                        <img src="/storage/img/yakiniku.jpg" alt="サンプル画像" class="w-full h-32 rounded-t-lg">
                    </div>
                    <div class="p-4 bg-white rounded-b-lg">
                        <h2 class="font-bold pb-2">牛助</h2>
                        <p class="text-xs pb-3">#大阪府 #焼肉</p>
                        <button class="text-xs bg-blue-600 text-white px-5 py-1 rounded transition duration-200 hover:bg-blue-400"><a href="">詳しく見る</a></button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
