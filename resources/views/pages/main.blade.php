@extends('app')

@section('title','Главная')

@section('content')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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


    <h1 class="mt-10 mb-5 text-xl">Наши отзывы</h1>
    <div data-slick='{"slidesToShow": 4, "slidesToScroll": 4}' class="slider">
        @foreach(\App\Models\Review::all()->take(10) as $review)

            <div class="border rounded-md px-5 py-5 mr-5">
                <p>{{$review->text}}</p>
                <p class="text-right">- {{$review->name}}</p>

                <div class="mt-5">
                    @for($i = 1; $i <= 5;  $i++)
                        <span class="fa fa-star {{ $i <= $review->rate ? "checked" : ""}}"></span>
                    @endfor
                </div>
            </div>

        @endforeach
    </div>
    <div class="flex flex-row justify-between mt-7">
        <div class="px-3 py-2 rounded-full bg-green-900 text-white font-bold cursor-pointer" id="toleft"><i class="fa fa-arrow-left"></i></div>
        <div class="px-3 py-2 rounded-full bg-green-900 text-white font-bold cursor-pointer" id="toright"><i class="fa fa-arrow-right"></i></div>
    </div>
    <script>
        $(".slider").slick({
            nextArrow : '#toright',
            prevArrow : '#toleft',
            variableWidth: true,
        });
    </script>
@endsection

