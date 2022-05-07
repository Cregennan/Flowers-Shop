@extends('app')

@section('title', 'Связь')

@section('content')
    <h1 class="text-xl mb-5">Добавить</h1>

    <form action="/flowers" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Название цветка
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  required name="name" id="name" type="text"  placeholder="Название">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Описание цветка
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required name="description" id="description" type="text" placeholder="Описание"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                Стоимость цветка
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required name="price" id="price" type="number" min="0" step="1" placeholder="Стоимость">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">
                Изображение цветка
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="picture" id="picture" type="file" accept=".jpg,.png" required placeholder="Изображение">
        </div>
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="errors-block flex flex-col">
                @foreach(\Illuminate\Support\Facades\Session::get('messages') as $message)
                    <span class="error text-red-900">{{$message}}</span>
                @endforeach
            </div>
        @endif
        <button class="p-4 bg-green-900 text-gray-100 rounded-md mt-10" id="add_flower" type="submit">Добавить</button>
    </form>
@endsection
