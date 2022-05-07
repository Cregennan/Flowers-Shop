<div class="flex flex-col">
    <img src="{{$bouquet->picture}}" alt="{{$bouquet->name}}"/>
    <h1 class="text-xl font-bold mt-5">{{$bouquet->name}}</h1>
    <p class="mt-1 text-sm">{{$bouquet->description}}</p>
    <p class="mt-3 text-lg font-bold">Цветы:</p>
    @foreach($bouquet->getFlowers() as $flowerdata)
        <p class="text-sm p-2 mt-1 border rounded-md"><a href="/flowers/{{$flowerdata->flower->id}}">{{$flowerdata->flower->name}}</a> -  {{$flowerdata->number}} шт.</p>
    @endforeach
    <p class="text-xl mt-10">Цена: {{$bouquet->price}} рублей</p>

</div>
