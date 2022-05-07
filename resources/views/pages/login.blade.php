@extends('app')

@section('title', 'Вход в аккаунт')

@section('content')
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden">
        <!-- Session Status -->

        <!-- Validation Errors -->
        <form method="POST" action="/login">
            @csrf
            <!-- Email Address -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Имя пользователя
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="Username">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Пароль
                </label>
                <input name="password" class="shadow appearance-none border @if(\Illuminate\Support\Facades\Session::has('error')) border-red-500 @endif rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <p class="text-red-500 text-xs italic">{{\Illuminate\Support\Facades\Session::get('message')}}</p>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                    Войти
                </button>
            </div>
        </form>
    </div>
@endsection
