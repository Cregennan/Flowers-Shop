@extends('app')

@section('title', "Заказ '$order->id'")

@section('content')
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
        <div class="absolute top-3 right-3 py-1 px-2 text-white rounded-full {{$order->status =="queued" ? "bg-green-900" : "bg-blue-700"}}">{{ $order->status =="queued" ? "В работе" : "Завершен" }}</div>
    </div>


@endsection
