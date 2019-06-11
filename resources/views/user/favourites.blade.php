@extends("user.layouts.app", array("title" => "favourites"))
@section("content")
<div class="">
    <header>
        <nav style="text-align:center">
            <a href="{{route('get_homepage')}}">ホームへ</a>
            <a href="{{route('get_user_favourites')}}">お気に入りへ</a>
            <a href="{{route('get_user_mypage')}}">{{$user->name}}</a>
        </nav>
    </header>
    @foreach ($restaurants as $restaurant)
      @include("user.subviews.restaurants_info", array("restaurant" => $restaurant))
    @endforeach
@endsection
