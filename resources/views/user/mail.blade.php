@extends("user.layouts.app", array("title" => "ログイン"))
<!--内容 引用 -->
@section("content")

<h1>ご登録ありがとうございます。</h1>
<p>あなたの情報は以下の通りです。</p>
<table>
    <tr>
        <td>名前</td>
        <td>{{$info->name}}</td>
    </tr>
    <tr>
        <td>email</td>
        <td>{{$info->email}}</td>
    </tr>
    <tr>
        <td>phone</td>
        <td>{{$info->phone}}</td>
    </tr>
    <tr>
        <td>postcode</td>
        <td>{{$info->postcode}}</td>
    </tr>
</table>



@endsection