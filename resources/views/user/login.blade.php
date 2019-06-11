<!--前台显示页面  -->
<!-- bootstrap的引用放在layouts/app文件中 -->
@extends("user.layouts.app", array("title" => "ログイン"))
<!--内容 引用 -->
@section("content")
<h1>ログイン</h1>
<!-- 当提交失败时，返回本页面 -->
<form method="post" action="{{ route('post_user_login') }}">
<!-- 必加，可以防止外部攻击 -->
  @csrf
<!-- 怎样显示错误信息，ex：email，输入后显示刚刚输入email -->
  メール：<input type="text" name="email">
  <br />
  パスワード：<input type="password" name="password">
  <br />
  <input type="submit" value="送信">
</form>

<a href="{{route('get_user_add')}}">新規登録</a>

@endsection
