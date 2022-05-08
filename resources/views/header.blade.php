<div class="header relative">
    <div class="logo"><a href="index.html"><img src="/images/logo.png" width="140" height="75" alt="" title="" border="0" /></a></div>
    <div id="menu">
        <ul>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.main')) selected @endif nav_link" ><a href="/">Главная</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.about')) selected @endif nav_link" ><a href="/about">О нас</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.flowers')) selected @endif nav_link" ><a href="/flowers">Цветы</a></li>

            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.bouquets')) selected @endif nav_link" ><a href="/bouquets">Букеты</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.shops')) selected @endif nav_link" ><a href="/shops">Магазины</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.delivery')) selected @endif nav_link" ><a href="/delivery">Доставка</a></li>
            <li class="@if(\Illuminate\Support\Facades\Route::is('pages.review')) selected @endif nav_link" ><a href="/review">Отзыв</a></li>

            @auth
                <li class="custom_nav_button"><a class="bg-red-900 text-gray-100" href="/logout">Выйти</a></li>
            @endauth
            @guest
                <li class="custom_nav_button"><a class="bg-red-900 text-gray-100" href="/login">Войти</a></li>
            @endguest

        </ul>
    </div>
    @auth
        <a href="/dashboard" class="absolute right-10 header-login-bottom p-2 bg-gray-100 text-gray-900 rounded-md cursor-pointeru">
            {{\Illuminate\Support\Facades\Auth::user()->username}}
        </a>
    @endauth

</div>
