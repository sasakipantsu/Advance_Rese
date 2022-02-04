@extends('layouts.default')

@section('title', '会員登録完了 - Rese')

@section('content')

    {{-- ロゴ --}}
    <div class="pl-28 mt-10">
        <a href="/" class="text-white flex space-x-2 mb-12">
            <svg class="h-8 w-8 rounded shadow-md bg-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
            <span class="text-2xl font-extrabold text-blue-600">Rese</span>
        </a>
    </div>

    {{-- 予約完了カード --}}
    <div class="w-1/3 h-52 mx-auto text-center bg-white shadow-md rounded">
        <p class="pt-16 mb-5">会員登録ありがとうございます</p>
        <a href="{{ route('login') }}">
            <button class="text-xs bg-blue-600 text-white px-5 py-1 rounded transition duration-200 hover:bg-blue-400">
                {{ __('ログインする') }}
            </button>
        </a>
    </div>

@endsection
