@extends('app')

@section('title', "Заказ '$order->id'")

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <div class="flex flex-col bg-white px-5 py-3 relative">
        <h1 class="text-xl font-bold">Заказ {{$order->id}}</h1>

        <p class="mt-0.5">Клиент: {{$order->client_name}}, Телефон: {{$order->client_phone}}</p>


        @if($order->is_custom)
            <div class="mt-1 text-sm p-3 border rounded-md flex flex-col ">
                <p class="font-bold">Букет: Сборный</p>
                @foreach($order->getFlowers() as $flowerdata)
                    <p class="text-sm p-2 mt-1 border rounded-md"><a href="/flowers/{{$flowerdata->flower->id}}">{{$flowerdata->flower->name}}</a> -  {{$flowerdata->number}} шт.</p>
                @endforeach
            </div>



        @else
            <p class="mt-1 text-sm p-3 border rounded-md flex flex-row justify-between">Букет: {{\App\Models\Bouquet::find($order->bouquet)->name}}   <a href="/bouquets/{{$order->bouquet}}" class="font-bold">Подробнее...</a></p>
        @endif

        <p class="mt-4 text-sm">Сумма: <span class="font-bold">{{$order->getPrice()}} {{\App\Actions\MoneyConverter::Convert($order->getPrice())}}</span></p>

        <a href="#ex1" rel="modal:open" data-micromodal-trigger="modal-1" data-order="{{$order->id}}" id="delete_order" class="absolute top-3 right-3 py-1.5 px-3 text-white rounded-full bg-red-800 hover:bg-red-900 transition-colors">Удалить</a>
    </div>

    <script>

    </script>
    <div id="ex1" class="modal">
        <form action="/orders/{{$order->id}}/delete" method="get" class="flex flex-col py-10 px-5">
            <h1 class="text-xl font-bold mb-4">Вы уверены что хотите удалить этот заказ?</h1>
            <p class="text-sm">Данное действие нельзя отменить</p>

            <div class="flex flex-row mt-10 justify-end">
                <a href="#" rel="modal:close" class="px-4 py-2 mr-2 bg-white border rounded-md hover:shadow-md">Отмена</a>
                <button type="submit" class="px-3 py-2 bg-red-800 hover:bg-red-900 border rounded-md text-white hover:shadow-md">Удалить</button>
            </div>
        </form>

    </div>
@endsection
