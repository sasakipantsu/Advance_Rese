@extends('layouts.default')

@section('title', '会員登録 - Rese')

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



    <div class="conteiner w-1/3 m-auto">
        <h2 class="text-3xl text-gray-700 font-bold pl-10">新規会員登録</h2>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="conteiner w-1/3 m-auto mt-16 mb-12">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <!-- Name -->
            <div>
                <x-label class="pl-10" for="name" :value="__('Name')" />

                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <input id="name" class="w-full rounded-md" type="text" name="name" :value="old('name')" required autofocus />
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label class="pl-10" for="email" :value="__('Email')" />

                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>

                    <input id="email" class="w-full rounded-md" type="email" name="email" :value="old('email')" required />
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label class="pl-10" for="password" :value="__('Password - 8文字以上で入力してください -')" />

                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>

                    <input id="password" class="w-full rounded-md" type="password" name="password" required autocomplete="new-password" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label class="pl-10" for="password_confirmation" :value="__('Confirm Password - パスワード確認 -')" />

                <div class="flex">
                    <div class="h-6 w-6 mx-2 my-auto"></div>

                    <input id="password_confirmation" class="w-full rounded-md" type="password" name="password_confirmation" required />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="mr-2 underline text-sm text-blue-700 hover:text-blue-400" href="{{ route('login') }}">
                    {{ __('ログインページへ') }}
                </a>

                <button class="text-xs bg-blue-700 text-white px-7 py-2 rounded transition duration-200 hover:bg-blue-400">
                    {{ __('会員登録') }}
                </button>
            </div>

        </div>
    </form>


@endsection

