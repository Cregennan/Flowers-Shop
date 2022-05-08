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



    <div style="position:relative;overflow:hidden;">
        <a href="https://yandex.ru/maps/43/kazan/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Казань</a>
        <a href="https://yandex.ru/maps/43/kazan/house/ulitsa_pushkina_17/YEAYdwVjTUYAQFtvfXt5eXRnYA==/?ll=49.123762%2C55.789488&utm_medium=mapframe&utm_source=maps&z=18.83" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Пушкина, 17 — Яндекс Карты</a>
        <iframe src="https://yandex.ru/map-widget/v1/-/CCUFZNtPgA" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
    </div>
@endsection
