@extends("user.layouts.app", array("title" => "会員新規登録"))
@section("content")
<h1>会員新規登録</h1>
<form method="post" action="{{ route('post_user_add') }}">
  @csrf
  email:  <input type="text" name="email" value="{{old('email')}}">
  @if($errors->has("email"))
    <p>{{ $errors->first("email") }}</p>
  @endif
  <br>
  名前:   <input type="text" name="name" value="{{old('name')}}">
  @if($errors->has("name"))
    <p>{{ $errors->first("name") }}</p>
  @endif
  <br>
  電話番号:<input type="text" name="phone" value="{{old('phone')}}">
  @if($errors->has("phone"))
    <p>{{ $errors->first("phone") }}</p>
  @endif
  <br>
  郵便番号:<input type="text" name="postcode" value="">
  <br>
  都道府県：<select name="mtb_prefecture_id">
    <option value="">都道府県を選択して下さい。</option>
    @foreach($mtb_prefectures as $mtb_prefecture)
      <option value="{{ $mtb_prefecture->id }}">{{ $mtb_prefecture->value }}</option>
    @endforeach
  </select>
  <br>
  住所１:  <input type="text" name="address1">
  <br>
  住所２:  <input type="text" name="address2">
  <br>
  パスワード:<input type="password" name="password" value="{{old('password')}}" >
  <br>
  パスワード確認:<input type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
  <br>
  <input type="submit" name="送信">
</form>
@endsection
