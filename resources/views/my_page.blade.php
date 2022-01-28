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

            <h2 class="font-bold pb-4 pt-12">予約状況</h2>

            {{-- @if (session('flash_message'))
                <div>
                    {{ session('flash_message') }}
                </div>
            @endif --}}

            {{-- ページネーション --}}
            <div class="mb-4">
                {{ $my_reservations->appends(request()->query())->links() }}
            </div>

            @foreach ($my_reservations as $my_reservation)
                <div class="py-6 px-5 text-sm bg-blue-600 text-white mb-4 rounded shadow-md">

                    <div class="h-10 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        @if ($loop->iteration)
                            <p class="pl-3">予約{{ $loop->iteration }}</p>
                        @endif
                    </div>

                    <table class="text-left">
                        <tr class="h-8">
                            <th class="w-1/3">Shop</th>
                            <td class="pl-8">{{ $my_reservation->shop->name }}</td>
                        </tr>
                        <tr class="h-8">
                            <th class="w-1/3"> Date</th>
                            <td class="pl-8">{{ $my_reservation->start_at->format('Y.m.d') }}</td>
                        </tr>
                        <tr class="h-8">
                            <th class="w-1/3"> Time</th>
                            <td class="pl-8">{{ $my_reservation->start_at->format('H:i') }}</td>
                        </tr>
                        <tr class="h-8">
                            <th class="w-1/3"> Number</th>
                            <td class="pl-8">{{ $my_reservation->total_number }}人</td>
                        </tr>
                    </table>

                    {{-- 予約削除 --}}
                    <form action="{{ route('reservation_delete') }}" method="POST">
                        @csrf
                        <div class="text-right mr-10">
                            <input type="hidden" name="id" value="{{ $my_reservation->id }}">
                            <button type="submit" class="shadow-lg px-3 py-1 bg-blue-500 text-white font-semibold rounded  hover:bg-blue-400 hover:shadow-sm hover:translate-y-0.5 transform transition">削除</button>
                        </div>
                    </form>
                </div>
            @endforeach



        </div>

        {{-- お気に入り店舗 --}}
        <div class="w-3/5">
            <h2 class="text-2xl pl-6 font-bold">{{ Auth::user()->name }}さん</h2>
            <h2 class="font-bold pl-6 py-4">お気に入り店舗</h2>

            {{-- ページネーション --}}
            <div class="mb-4 px-6">
                {{ $shops->appends(request()->query())->links() }}
            </div>

            {{-- 店舗カード --}}
            <div class="flex justify-evenly flex-wrap">

                @foreach ($shops as $shop)
                    <div class="w-52 shadow-md mb-5">
                        <div>
                            <img src="{{ $shop->img_url }}" alt="サンプル画像" class="w-full h-32 rounded-t-lg">
                        </div>
                        <div class="p-4 bg-white rounded-b-lg">
                            <h2 class="font-bold pb-2">{{ $shop->name }}</h2>
                            <div class="flex">
                                <p class="text-xs pb-3">#{{ $shop->area->name }} </p>
                                @foreach($shop->genres as $genre)
                                <p class="text-xs pb-3 pl-4">#{{ $genre->genre_name }} </p>
                                @endforeach
                            </div>

                            <div class="flex justify-between">
                                <form action="/detail/{{ $shop->id }}" method="GET">
                                    @csrf
                                    <button type="submit" class="text-xs bg-blue-600 text-white px-5 py-1 rounded transition duration-200 hover:bg-blue-400">詳しく見る</button>
                                </form>

                                {{-- お気に入り機能 --}}
                                @if($shop->users()->where('user_id', Auth::id())->exists())
                                    <form action="{{ route('mypage_favorite_delete', $shop) }}" method="POST">
                                        @csrf

                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="red" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('favorite', $shop) }}" method="POST">
                                        @csrf

                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="gray" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
