<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> {{\Illuminate\Support\Facades\Config::get('app.name')}} - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
</head>

<body>
<div id="wrap">

    @include('header')

    <div class="center_content">
        <div class="left_content">
            @yield('content')
        </div>
        @include('modules.right')
        <div class="clear"></div>
    </div>

    @include('footer')


</div>

</body>
</html>
