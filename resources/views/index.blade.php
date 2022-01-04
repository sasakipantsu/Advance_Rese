@extends('layouts.default')

@section('title', '店舗一覧 - Rese')

@section('content')


    <div class="relative min-h-screen md:flex">

        <!-- mobile menu bar -->
        <div class="bg-blue-500 text-gray-100 flex justify-between md:hidden">

            <!-- logo -->
            <a href="/members" class="block p-4 text-white font-bold">Rese</a>

            <!-- mobile menu button -->
            <button class="mobile-menu-button p-4 focus:outline-none rounded transition duration-200 hover:bg-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
        </div>

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
                        <select name="area_id" class="py-2 text-sm rounded-md">
                                <option value=" " selected>all area</option>
                            <optgroup label="北海道">
                                <option value="1">北海道</option>
                            </optgroup>
                            <optgroup label="東北">
                                <option value="2">青森県</option>
                                <option value="3">岩手県</option>
                                <option value="4">宮城県</option>
                                <option value="5">秋田県</option>
                                <option value="6">山形県</option>
                                <option value="7">福島県</option>
                            </optgroup>
                            <optgroup label="関東">
                                <option value="8">茨城県</option>
                                <option value="9">栃木県</option>
                                <option value="10">群馬県</option>
                                <option value="11">埼玉県</option>
                                <option value="12">千葉県</option>
                                <option value="13">東京都</option>
                                <option value="14">神奈川県</option>
                            </optgroup>
                            <optgroup label="甲信越">
                                <option value="15">山梨県</option>
                                <option value="16">長野県</option>
                                <option value="17">新潟県</option>
                            </optgroup>
                            <optgroup label="北陸">
                                <option value="18">富山県</option>
                                <option value="19">石川県</option>
                                <option value="20">福井県</option>
                            </optgroup>
                            <optgroup label="東海">
                                <option value="21">岐阜県</option>
                                <option value="22">静岡県</option>
                                <option value="23">愛知県</option>
                                <option value="24">三重県</option>
                            </optgroup>
                            <optgroup label="近畿">
                                <option value="25">滋賀県</option>
                                <option value="26">京都府</option>
                                <option value="27">大阪府</option>
                                <option value="28">兵庫県</option>
                                <option value="29">奈良県</option>
                                <option value="30">和歌山県</option>
                            </optgroup>
                            <optgroup label="中国">
                                <option value="31">鳥取県</option>
                                <option value="32">島根県</option>
                                <option value="33">岡山県</option>
                                <option value="34">広島県</option>
                                <option value="35">山口県</option>
                            </optgroup>
                            <optgroup label="四国">
                                <option value="36">徳島県</option>
                                <option value="37">香川県</option>
                                <option value="38">愛媛県</option>
                                <option value="39">高知県</option>
                            </optgroup>
                            <optgroup label="九州">
                                <option value="40">福岡県</option>
                                <option value="41">佐賀県</option>
                                <option value="42">長崎県</option>
                                <option value="43">熊本県</option>
                                <option value="44">大分県</option>
                                <option value="45">宮崎県</option>
                                <option value="46">鹿児島県</option>
                            </optgroup>
                            <optgroup label="沖縄">
                                <option value="47">沖縄県</option>
                            </optgroup>
                        </select>

                        {{-- ジャンル検索 --}}
                        <select name="genre_name" class="py-2 text-sm rounded-md">
                            <option value=" " selected>All genre</option>
                            <option value="寿司">寿司</option>
                            <option value="焼肉">焼肉</option>
                            <option value="イタリアン">イタリアン</option>
                            <option value="居酒屋">居酒屋</option>
                            <option value="ラーメン">ラーメン</option>
                            <option value="フレンチ">フレンチ</option>
                            <option value="中華">中華</option>
                            <option value="カレー">カレー</option>
                        </select>

                        {{-- 名前検索 --}}
                        <span class="inline-block　antialiased">
                            <input type="search" name="name" class="w-1/3 py-2 text-sm rounded-md relative" placeholder="Search..." autocomplete="off">

                            <button type="submit" class="py-2 px-2 rounded-md text-gray-500 absolute top-0 right-0 ">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </button>
                        </span>
                    </form>

                </div>

            </div>

            {{-- 店舗カード --}}
            <div class="flex justify-evenly flex-wrap">

                {{-- @if(!empty($message))
                    <div class="alert alert-primary" role="alert">{{ $message}}</div>
                @endif --}}

                @if(isset($shops))
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

                                @auth
                                    @if($shop->users()->where('user_id', Auth::id())->exists())
                                        <form action="{{ route('favorite_delete', $shop) }}" method="POST">
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
                                @endauth
                            </div>

                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection

