<div class="header">
    <div class="logo"><a href="index.html"><img src="/images/logo.png" width="140" height="75" alt="" title="" border="0" /></a></div>
    <div id="menu">
        <ul>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.main')) selected @endif" ><a href="/">Главная</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.about')) selected @endif" ><a href="/about">О нас</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.flowers')) selected @endif" ><a href="/flowers">Цветы</a></li>

            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.bouquets')) selected @endif" ><a href="/bouquets">Букеты</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.shops')) selected @endif" ><a href="/shops">Магазины</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.delivery')) selected @endif" ><a href="/delivery">Доставка</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.contact')) selected @endif" ><a href="/contact">Связь</a></li>
        </ul>
    </div>

</div>
