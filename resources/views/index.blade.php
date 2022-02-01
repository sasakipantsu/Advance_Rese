<style>
    .love {
    color: red !important;
    }
</style>

@extends('layouts.default')

@section('title', '店舗一覧 - Rese')

@section('content')


    <div class="relative min-h-screen md:flex">

        {{-- <!-- mobile menu bar -->
        <div class="bg-blue-500 text-gray-100 flex justify-between md:hidden">

            <!-- logo -->
            <a href="/members" class="block p-4 text-white font-bold">Rese</a>

            <!-- mobile menu button -->
            <button class="mobile-menu-button p-4 focus:outline-none rounded transition duration-200 hover:bg-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
        </div> --}}

        <!-- サイドバー -->
        <div class="sidebar bg-blue-600 text-blue-100 w-1/5 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">

            <!-- ロゴ -->
            <a href="/" class="text-white flex items-center space-x-2 px-4">
                <svg class="h-8 w-8 rounded shadow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                <span class="text-2xl font-extrabold">Rese</span>
            </a>

            <!-- メニュー -->
            @guest
                <nav>
                    <a href="/" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-300 hover:text-white">
                        Home
                    </a>
                    <a href="{{ route('register') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-300 hover:text-white">
                        {{ __('会員登録') }}
                    </a>
                    <a href="{{ route('login') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-300 hover:text-white">
                        {{ __('ログイン') }}
                    </a>
                </nav>
            @endguest

            <!-- ログイン時のメニュー -->
            @auth
                <nav>
                    <a href="/" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-300 hover:text-white">
                        Home
                    </a>

                    <a href="/mypage" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-300 hover:text-white">
                        マイページ
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left py-2.5 px-4 rounded transition duration-200 hover:bg-blue-300 hover:text-white">
                            {{ __('ログアウト') }}
                        </button>
                    </form>
                </nav>
            @endauth
        </div>

        {{-- 検索バー --}}
        <div class="conteiner mt-16 p-6 w-4/5 relative">

            <div class=" fixed top-6 left-64 right-6">

                <div class="text-right">
                    <form action="search" method="POST">
                        @csrf

                        {{-- 地域検索 --}}
                        <select name = "area_id" class="py-2 text-sm rounded-md">
                            <option value = "0" selected>all area</option>
                            @foreach($prefs as $pref)
                                @if((!empty($request->area_id) && $request->area_id == $pref->id))
                                    <option value = "{{ $pref->id }}" selected>{{ $pref->name }}</option>
                                @else
                                    <option value = "{{ $pref->id }}">{{ $pref->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        {{-- ジャンル検索 --}}
                        <select name="genre_id" class="py-2 text-sm rounded-md">
                            <option value = "0" selected>All genre</option>
                            @foreach($genres as $genre)
                                @if((!empty($request->genre_id) && $request->genre_id == $genre->id))
                                    <option value = "{{ $genre->id }}" selected>{{ $genre->genre_name }}</option>
                                @else
                                    <option value = "{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                @endif
                            @endforeach
                        </select>

                        {{-- 名前検索 --}}
                        <span class="inline-block　antialiased">
                            <input type="search" name="name" class="w-1/3 py-2 text-sm rounded-md relative" placeholder="Search..." autocomplete="off">

                            <button type="submit" class="py-2 px-2 rounded-md text-gray-500 absolute top-0 right-0 ">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 bg-white"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </button>
                        </span>
                    </form>

                </div>

            </div>

             {{-- ページネーション --}}
            <div class="mb-4">
                {{ $shops->appends(request()->query())->links() }}
            </div>

            {{-- 店舗カード --}}
            <div class="flex justify-evenly flex-wrap">

                @if(!empty($message))
                    <div class="alert alert-primary" role="alert">{{ $message}}</div>
                @endif

                {{-- @isset($shops) --}}
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
                                        <button type="submit" class="text-xs bg-blue-600 text-white mt-2 px-5 py-1 rounded transition duration-200 hover:bg-blue-400">詳しく見る</button>
                                    </form>

                                    {{-- お気に入り機能 --}}
                                    @auth
                                        @if($favorite_model->favorite_exist(Auth::user()->id,$shop->id))
                                            <p class="mt-2">
                                                <button class="js-favorite-toggle love" data-shopid="{{ $shop->id }}">
                                                    <i class="fas fa-heart h-6 w-6 py-1"></i>
                                                </button>
                                            </p>
                                        @else
                                            <p class="mt-2">
                                                <button class="js-favorite-toggle" data-shopid="{{ $shop->id }}">
                                                    <i class="fas fa-heart h-6 w-6 py-1"></i>
                                                </button>
                                            </p>
                                        @endif​
                                    @endauth
                                </div>

                            </div>
                        </div>
                    @endforeach
                {{-- @endisset --}}
            </div>
        </div>
    </div>

@endsection

