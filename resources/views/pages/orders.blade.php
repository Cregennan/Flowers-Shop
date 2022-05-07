@extends('app')

@section('title', "Букеты")

@section('content')


    <div class="flex flex-col">
        <div class="title"><span class="title_icon"><img src="images/bullet1.gif" width="25" height="25" alt="" title="" /></span>Заказы клиентов</div>

        @foreach(\App\Models\Order::all() as $order)
            <a href="/orders/{{$order->id}}" class="mt-5">
                <div class="flex flex-col bg-white rounded-md border px-5 py-3 relative">
                    <h1 class="text-xl font-bold">Заказ {{$order->id}}</h1>

                    <p class="mt-0.5">Клиент: {{$order->client_name}}, Телефон: {{$order->client_phone}}</p>
                    <p class="mt-0.5">Букет: {{$order->is_custom ? "Сборный" : \App\Models\Bouquet::find($order->bouquet)->name}}</p>
                    <p class="mt-4">Сумма: <span class="font-bold">{{$order->getPrice()}} {{\App\Actions\MoneyConverter::Convert($order->getPrice())}}</span></p>

                    <div class="absolute top-3 right-3 py-1 px-2 text-white rounded-full {{$order->status =="queued" ? "bg-green-900" : "bg-blue-700"}}">{{ $order->status =="queued" ? "В работе" : "Завершен" }}</div>
                </div>
            </a>
        @endforeach


    </div>
@endsection
