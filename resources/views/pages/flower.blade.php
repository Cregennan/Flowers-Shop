@extends('app')

@section('title', $flower->name)

@section('content')
    <div class="title"><span class="title_icon"><img src="/images/bullet3.gif" width="25" height="25"alt="" title="" /></span>{{$flower->name}}</div>

    <div class="feat_prod_box_details">
        <div class="prod_img"><img src="{{$flower->picture}}" alt="" title="" border="0" />
            <br /><br />
        </div>
        <div class="prod_det_box">
            <div class="box_top"></div>
            <div class="box_center">
                <div class="prod_title">{{$flower->name}}</div>
                <p class="details">{{$flower->description}}</p>
                <div class="price"><strong>ЦЕНА:</strong> <span class="red">{{$flower->price}} рублей</span></div>
                <div class="clear"></div>
            </div>
            <div class="box_bottom"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
@endsection
