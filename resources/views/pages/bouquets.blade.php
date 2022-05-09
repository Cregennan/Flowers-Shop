@extends('app')

@section('title', "Букеты")

@section('content')
    <div class="title"><span class="title_icon"><img src="images/bullet1.gif" width="25" height="25" alt="" title="" /></span>Букеты</div>

    @foreach(\App\Models\Bouquet::all() as $bouquet)
        <div class="feat_prod_box">
            <div class="prod_img"><img src="{{$bouquet->picture}}" width="127" height="85" alt="" title="" border="0" /></div>
            <a href="/bouquets/{{$bouquet->id}}">
                <div class="prod_det_box">
                    <div class="box_center">
                        <div class="prod_title">{{$bouquet->name}}</div>
                        <p class="details">{{$bouquet->price}} {{\App\Actions\MoneyConverter::Convert($bouquet->price)}}</p>
                        <div class="clear"></div>
                    </div>
                </div>
            </a>
            <div class="clear"></div>
        </div>
    @endforeach
@endsection
