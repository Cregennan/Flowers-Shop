@extends('app')

@section('title', 'Сборка букета')

@section('content')
    <h1 class="text-xl mb-5">Добавить</h1>

    <form action="/bouquets" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Название букета
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" required  placeholder="Название">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Описание букета
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description" type="text" required placeholder="Описание"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                Стоимость букета
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="price" id="price" type="number" min="0" step="1" required placeholder="Стоимость">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">
                Изображение букета
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="picture" id="picture" type="file" accept=".jpg,.png" required placeholder="Изображение букета">
        </div>
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="errors-block flex flex-col">
                @foreach(\Illuminate\Support\Facades\Session::get('messages') as $message)
                    <span class="error text-red-900">{{$message}}</span>
                @endforeach
            </div>
        @endif


        <h2 class="text-xl font-bold mt-10">Цветы</h2>
        <div id="flower-container" class="mt-5">

            @foreach(\App\Models\Flower::all() as $flower)
                <div class="flower-row flex flex-row items-center justify-between mt-5">
                    <span class="mr-14 text-xl">{{$flower->name}}</span>
                    <input name="flower[{{$flower->id}}]" type="number" value="0" min="0" step="1" required class="shadow appearance-none border rounded w-20 py-2 mr-40 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                </div>
            @endforeach
        </div>
        <button class="p-4 bg-green-900 text-gray-100 rounded-md mt-10" id="add_flower" type="submit">Добавить</button>
    </form>

    <script>

    </script>
@endsection
