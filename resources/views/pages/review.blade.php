@extends('app')

@section('title', 'Связь')

@section('content')
    <h1 class="text-xl mb-5">Оставить отзыв</h1>

    <form action="/reviews" method="post">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Имя
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" required  placeholder="Имя">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
                Отзыв
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="text" id="text" type="text" required  placeholder="Отзыв"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="rate">
                Оценка
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="rate" id="rate" type="number" required  placeholder="Отзыв" value="5" min="1" max="5" step="1">
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

    <script>

    </script>
@endsection
