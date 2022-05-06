<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> {{\Illuminate\Support\Facades\Config::get('app.name')}} - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
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
