@extends('app')

@section('title', "Букет '$bouquet->name'")

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <div class="flex flex-col">
        <img src="{{$bouquet->picture}}" alt="{{$bouquet->name}}"/>
        <h1 class="text-xl font-bold mt-5">{{$bouquet->name}}</h1>
        <p class="mt-1 text-sm">{{$bouquet->description}}</p>
        <p class="mt-3 text-lg font-bold">Цветы:</p>
        @foreach($bouquet->getFlowers() as $flowerdata)
            <p class="text-sm p-2 mt-1 border rounded-md"><a href="/flowers/{{$flowerdata->flower->id}}">{{$flowerdata->flower->name}}</a> -  {{$flowerdata->number}} шт.</p>
        @endforeach
        <p class="text-xl mt-10">Цена: {{$bouquet->price}} рублей</p>

        @auth
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
            <a href="#ex1" rel="modal:open" data-micromodal-trigger="modal-1" class="mt-5 py-1.5 px-3 text-white rounded-full bg-red-800 hover:bg-red-900 transition-colors w-1/5">Удалить</a>
            <div id="ex1" class="modal">
                <form action="/bouquets/{{$bouquet->id}}/delete" method="get" class="flex flex-col py-10 px-5">
                    <h1 class="text-xl font-bold mb-4">Вы уверены что хотите удалить этот букет?</h1>
                    <p class="text-sm">Возможны удаления заказов с этим букетом. Данное действие нельзя отменить</p>
                    <div class="flex flex-row mt-10 justify-end">
                        <a href="#" rel="modal:close" class="px-4 py-2 mr-2 bg-white border rounded-md hover:shadow-md">Отмена</a>
                        <button type="submit" class="px-3 py-2 bg-red-800 hover:bg-red-900 border rounded-md text-white hover:shadow-md">Удалить</button>
                    </div>
                </form>

            </div>
        @endauth
    </div>

@endsection
