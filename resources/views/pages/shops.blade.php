@extends('app')

@section('title', 'Магазины')

@section('content')
    <div class="title"><span class="title_icon"><img src="images/bullet1.gif" width="25" height="25" alt="" title="" /></span>Магазины</div>

    <div class="feat_prod_box">

        <div class="prod_img"><img src="images/about1.gif" width="127" height="85" alt="" title="" border="0" /></div>

        <div class="prod_det_box">
            <div class="box_center">
                <div class="prod_title">Магазин 1</div>
                <p class="details">Казань, ул. Пушкина, 17</p>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>


    <div class="feat_prod_box">
        <div class="prod_img"><img src="images/about2.gif"  width="127" height="85" alt="" title="" border="0" /></div>
        <div class="prod_det_box">
            <div class="box_center">
                <div class="prod_title">Магазин 2</div>
                <p class="details">Казань, пр. Хусаина Ямашева, 96</p>
                <div class="clear"></div>
            </div>

        </div>
        <div class="clear"></div>
    </div>
@endsection
