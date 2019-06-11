@extends("user.layouts.app", array("title" => "個人情報"))

@section("content")
<!-- <caption>個人情報</caption> -->
<table class = "table table-striped table-hover">
    <caption>個人情報</caption>
    <thead>
        <tr>
            <th>email</th>
            <th>名前</th>
            <th>電話番号</th>
            <th>郵便番号</th>
            <th>住所</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$user->email}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->postcode}}</td>
            <td>{{$mtb_prefecture." ".$user->address1."".$user->address2}}</td>
        </tr>
    </tbody>
</table>
<a href="edit">編集</a>
<br>
<a href="mypage">mypageへ</a>
@endsection
