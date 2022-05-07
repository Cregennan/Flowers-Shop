@extends('app')

@section('title', 'Панель управления')

@section('content')
    <div class="flex flex-col p-5">
        <h1 class="text-xl font-bold mb-8">Панель управления</h1>
        <div class="grid grid-cols-3 gap-5">
            <a href="/bouquet/create" class="px-3 py-2 rounded-md bg-slate-600 text-white">Добавить букет</a>
            <a href="/flower/create" class="px-3 py-2 rounded-md bg-slate-600 text-white">Добавить цветок</a>
            <a href="/orders/" class="px-3 py-2 rounded-md bg-slate-600 text-white">Окно заказов</a>
        </div>

        <h1 class="text-xl font-bold mt-5 mb-8">Возможности</h1>
        <div class="grid grid-cols-3 gap-5">
            <a href="/test403" class="px-3 py-2 rounded-md bg-slate-600 text-white">Страница 403</a>
            <a href="/tedwdwdwdst403" class="px-3 py-2 rounded-md bg-slate-600 text-white">Страница 404</a>
        </div>

    </div>
@endsection
