@extends('layouts.default')

@section('title', '店舗詳細 - Rese')

@section('content')

    {{-- ロゴ --}}
    <div class="pl-28 mt-10">
        <a href="/" class="text-white flex space-x-2 mb-5">
            <svg class="h-8 w-8 rounded shadow-md bg-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
            <span class="text-2xl font-extrabold text-blue-600">Rese</span>
        </a>
    </div>


    <div class="py-10 h-full px-40 flex justify-between">

        {{-- 店舗詳細 --}}
        <div class="w-5/12">

            {{-- 店舗名 --}}
            <h2 class="text-xl font-bold mb-8">{{ $shop->name }}</h2>

            {{-- 画像 --}}
            <div>
                <img src="{{ $shop->img_url }}" alt="サンプル画像" class="">
            </div>

            {{-- タグ --}}
            @foreach($shop->genres as $genre)
            <p class="py-10">#{{ $shop->area->name }}  #{{ $genre->genre_name }}</p>
            @endforeach

            {{-- 紹介文 --}}
            <p>{{ $shop->introduction }}</p>

        </div>

        {{-- ゲスト用ページ --}}
        @guest
            <div class="w-1/3 h-52 mx-auto text-center bg-white shadow-md rounded">
                <p class="pt-16 mb-5">予約には会員登録が必要です</p>
                <button class="text-xs bg-blue-600 text-white px-5 py-1 rounded transition duration-200 hover:bg-blue-400">
                    <a href="{{ route('register') }}">{{ __('会員登録') }}</a>
                </button>
            </div>
        @endguest


        {{-- 予約フォーム --}}
        @auth
            <div class="w-5/12 bg-blue-600 rounded relative">
                <form action="{{ route('reservation') }}" method="POST">
                    <div class="px-6">
                        <h2 class="text-white text-xl font-bold py-7">予約</h2>
                        @csrf

                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                        <div>
                            <input type="datetime-local" name="start_at" class="block h-9 w-full mb-4 text-sm rounded-md" required>
                            <select name="total_number" class="h-9 w-full text-sm mb-5 rounded-md">
                                @for ($i = 1; $i <= 20; $i++)
                                    <option value="{{ $i }}">{{ $i }}人</option>
                                @endfor
                            </select>
                        </div>

                        {{-- 予約確認 --}}
                        {{-- <div class="py-6 bg-blue-500 rounded-md">
                            <table class="w-full text-left text-white">
                                <tr>
                                    <th class="w-1/3 pl-4">Shop</th>
                                    <td>{{ $shop->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w-1/3 pl-4"> Date</th>
                                    <td>仮１</td>
                                </tr>
                                <tr>
                                    <th class="w-1/3 pl-4"> Time</th>
                                    <td>仮１</td>
                                </tr>
                                <tr>
                                    <th class="w-1/3 pl-4"> Number</th>
                                    <td>仮１</td>
                                </tr>
                            </table>
                        </div> --}}
                    </div>

                    {{-- ボタン --}}
                    <button type="submit" class="text-white py-2 w-full bg-blue-700 absolute bottom-0 rounded-b-lg transition duration-200 hover:bg-blue-500">予約する</button>
                </form>
            </div>
        @endauth
    </div>

@endsection
