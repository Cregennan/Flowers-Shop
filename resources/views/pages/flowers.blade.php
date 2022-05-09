@extends('app')

@section('title','Цветы')

@section('content')
    <div class="title"><span class="title_icon"><img src="images/bullet1.gif" width="25" height="25" alt="" title="" /></span>Товары</div>

    <div class="new_products">

        @foreach(\App\Models\Flower::all() as $flower)
            <div class="new_prod_box">
                <a href="/flower/{{$flower->id}}">{{$flower->name}}</a>
                <div class="new_prod_bg">
                    <a href="/flowers/{{$flower->id}}"><img src="{{$flower->picture}}" alt="" title="" class="thumb" border="0" /></a>
                    <h> {{$flower->price}} {{\App\Actions\MoneyConverter::Convert($flower->price)}} </h>
                </div>
            </div>
        @endforeach

    </div>


    <div class="clear"></div>
@endsection
