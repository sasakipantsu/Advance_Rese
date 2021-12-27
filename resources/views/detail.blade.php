@extends('layouts.default')

@section('title', '店舗詳細 - Rese')

@section('content')


            {{-- ロゴ
            <a href="#" class="text-white flex space-x-2 mb-12">
                <svg class="h-8 w-8 rounded shadow-md bg-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                <span class="text-2xl font-extrabold text-blue-600">Rese</span>
            </a> --}}

    {{-- ロゴ --}}
    <div class="pl-28 mt-10">
        <a href="/" class="text-white flex space-x-2 mb-5">
            <svg class="h-8 w-8 rounded shadow-md bg-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
            <span class="text-2xl font-extrabold text-blue-600">Rese</span>
        </a>
    </div>


    <div class="py-10 h-screen px-40 flex justify-between">

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
            <p class="py-10">#{{ $shop->area->name }}  #{{ $genre->name }}</p>
            @endforeach

            {{-- 紹介文 --}}
            <p>{{ $shop->introduction }}</p>

        </div>


        {{-- 予約フォーム --}}
        <div class="w-5/12 bg-blue-600 rounded relative">
            <form action="{{ route('reservation') }}" method="POST">
                <div class="px-6">
                    <h2 class="text-white text-xl font-bold py-7">予約</h2>
                    @csrf

                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <div>
                        <input type="date" name="date" class="block h-9 text-sm rounded-md" required>
                        <div class="py-4">
                            <input type="time" name="time" class="block h-9 w-full text-sm rounded-md" required>
                        </div>
                        <select name="total_number" id="" class="h-9 w-full text-sm mb-5 rounded-md">
                            <option value="1">1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                            <option value="7">7人</option>
                            <option value="8">8人</option>
                            <option value="9">9人</option>
                            <option value="10">10人</option>
                            <option value="11">11人</option>
                            <option value="12">12人</option>
                            <option value="13">13人</option>
                            <option value="14">14人</option>
                            <option value="15">15人</option>
                            <option value="16">16人</option>
                            <option value="17">17人</option>
                            <option value="18">18人</option>
                            <option value="19">19人</option>
                            <option value="20">20人</option>
                        </select>
                    </div>

                    {{-- 予約確認 --}}
                    <div class="py-6 bg-blue-500 rounded-md">
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
                    </div>
                </div>

                {{-- ボタン --}}
                <button type="submit" class="text-white py-2 w-full bg-blue-700 absolute bottom-0 rounded-b-lg transition duration-200 hover:bg-blue-500">予約する</button>
            </form>
        </div>
    </div>

@endsection
