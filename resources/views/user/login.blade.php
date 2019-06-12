@extends("user.layouts.app", array("title" => "ログイン"))

@section("content")
<h1>ログイン</h1>

<form method="post" action="{{ route('post_user_login') }}">

  @csrf

  メール：<input type="text" name="email">
  <br />
  パスワード：<input type="password" name="password">
  <br />
  <input type="submit" value="送信">
</form>

<a href="{{route('get_user_add')}}">新規登録</a>

@endsection
