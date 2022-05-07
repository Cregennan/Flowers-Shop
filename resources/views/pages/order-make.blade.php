@extends('app')

@section('title', 'Создать заказ')


@if(\Illuminate\Support\Facades\Session::has('status') && \Illuminate\Support\Facades\Session::get('status') == 'success')
    @section('content')
        <h1 class="text-xl mb-8"> Ваш заказ принят, спасибо!</h1>
        <a class="p-3 text-sm bg-green-900 text-white mt-10 rounded-md" href="/">На главную</a>
    @endsection
@else

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <h1 class="text-xl mb-5">Добавить</h1>

    <form action="/order" method="post" id="make_order_form" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Ваше имя
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" required  placeholder="Имя">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                Ваш номер телефона
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="phone" id="phone" type="text" required placeholder="Номер телефона"/>
        </div>
        <div class="flex justify-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="is_custom" id="ordertype1" checked value="off">
                <label class="form-check-label inline-block text-gray-800" for="ordertype1">Выберу букет из списка</label>
            </div>
            <div class="form-check form-check-inline ml-5">
                <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="is_custom" id="ordertype2" value="on">
                <label class="form-check-label inline-block text-gray-800" for="ordertype2">Соберу букет сам</label>
            </div>
        </div>

        <div class="flex justify-start mt-5" id="defined_bouquet">
            <label></label>
            <select class="bg-white text-black rounded-md border"  id="defined_bouquet_select" name="bouquet">
                @foreach(\App\Models\Bouquet::all() as  $bouquet)
                    <option data-price="{{$bouquet->price}}" value="{{$bouquet->id}}">{{$bouquet->name}}</option>
                @endforeach
            </select>
        </div>


        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="errors-block flex flex-col">
                @foreach(\Illuminate\Support\Facades\Session::get('messages') as $message)
                    <span class="error text-red-900">{{$message}}</span>
                @endforeach
            </div>
        @endif

        <div id="custom_bouquet" class="hidden">
            <h2 class="text-xl font-bold mt-10">Цветы</h2>
            <div id="flower-container" class="mt-5">

                @foreach(\App\Models\Flower::all() as $flower)
                    <div class="flower-row flex flex-row items-center justify-between mt-5">
                        <span class="mr-14 text-xl">{{$flower->name}}</span>
                        <input data-price="{{$flower->price}}"  name="flower[{{$flower->id}}]" type="number" value="0" min="0" step="1" required class="custom_flower_data shadow appearance-none border rounded w-20 py-2 mr-40 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                    </div>
                @endforeach
            </div>
        </div>

        <p class="text-xl font-bold ">Стоимость: <span id="total_price"></span></p>
        <button class="p-4 bg-green-900 text-gray-100 rounded-md mt-10" id="add_flower" type="submit">Добавить</button>
    </form>

    <script>
        function calcpricedefined(){
            let select = document.getElementById('defined_bouquet_select');
            let price = select.options[select.selectedIndex].dataset.price;
            return price;
        }

        function calcpricecustom(){
            let price =  0;
            let elements = $(".custom_flower_data").each(function(){
                price += $(this).data('price') * $(this).val();
            });
            return price;
        }

        $(document).on('change',  "[type='radio'][name='is_custom']", function(e){
            let value = document.querySelector("[type='radio'][name='is_custom']:checked").value;
            if(value === 'on'){
                document.getElementById('total_price').innerText = calcpricecustom();
                $("#defined_bouquet").addClass("hidden");
                $("#custom_bouquet").removeClass("hidden");
            }else {
                document.getElementById('total_price').innerText = calcpricedefined();
                $("#defined_bouquet").removeClass("hidden");
                $("#custom_bouquet").addClass("hidden");
            }
        });
        $(document).on('change',  '.custom_flower_data', function(){
            document.getElementById('total_price').innerText = calcpricecustom();
        });
        $(document).on('change',  '#defined_bouquet_select', function(){
            document.getElementById('total_price').innerText = calcpricedefined();
        });
        document.getElementById('total_price').innerText = calcpricedefined();

        $(document).on('submit', "#make_order_form", function(e){
            e.preventDefault();
            let value = document.querySelector("[type='radio'][name='is_custom']:checked").value;
            if(value == 'on') {
                //custom
                let price = calcpricecustom();
                console.log(price);
                if(price == 0){
                    iziToast.error({
                        title: "Ошибка!",
                        message: 'Должен быть выбран хотя-бы один цветок',
                        position: 'bottomCenter',
                    });
                }else{
                    e.currentTarget.submit();
                }
            }else{
                //defined
                let price = calcpricedefined();
                if(price == 0){
                    iziToast.error({
                        title: "Ошибка!",
                        message: 'Ошибка в букете',
                        position: 'bottomCenter',
                    });
                    e.preventDefault();
                }else{
                    e.currentTarget.submit();
                }
            }
        });




    </script>
@endsection

@endif
