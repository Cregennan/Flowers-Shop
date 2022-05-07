@extends('app')

@section('title', "Букет '$bouquet->name'")

@section('content')
    @include('components.bouquet', ['bouquet'=>$bouquet]);
@endsection
