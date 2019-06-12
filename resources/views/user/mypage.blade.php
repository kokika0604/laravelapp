@extends("user.layouts.app", array("title" => "mypage"))

@section("content")
<h1>Welcome,{{$user->name}}!<h1>
    <br>
    <a href="homepage">店舗一覧</a>
    <br>
    <a href="info">個人情報</a>
    <br>
    <a href="{{ route('get_user_favourites') }}">お気に入り</a>
    <br>
    <a href="{{route('get_user_logout')}}">logout</a>
    
@endsection
