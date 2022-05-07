@extends('app')

@section('title','Главная')

@section('content')

    <div class="title"><span class="title_icon"><img src="images/bullet1.gif" width="25" height="25" alt="" title="" /></span>Популярные цветы</div>

    @foreach(\App\Models\Flower::all()->take(3) as $flower)

        <div class="feat_prod_box">
            <div class="prod_img"><a href="/flowers/{{$flower->id}}"><img src="{{$flower->picture}}" alt="" title="" border="0" /></a></div>
            <div class="prod_det_box">
                <div class="box_center">
                    <div class="prod_title">{{$flower->name}}</div>
                    <p class="details">{{\Illuminate\Support\Str::limit($flower->description, 150)}}</p>
                    <a href="/flowers/{{$flower->id}}" class="more">  подробнее  </a>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    @endforeach

@endsection

