@extends('restaurant.layouts.app',['title'=>'店舗ログイン'])

@section('content')
  <form action="{{route('post_restaurant_login')}}" method="post">
    @csrf
    メールアドレス：<input type="text" name="email"><br>
    パスワード:<input type="password" name="password"><br>
    @isset($error)
    <span>{{$error}}</span><br>
    @endif
    <input type="submit" value="ログイン">
  </form>
  <a href="add">新規登録</a>
@endsection
