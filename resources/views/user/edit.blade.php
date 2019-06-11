@extends("user.layouts.app", array("title" => "個人情報編集"))

@section("content")
<h1>個人情報編集</h1>
<form method="post" action="{{ route('post_user_edit') }}" class="form-horizontal" role="form">
    <div class="form-group">
  @csrf
  email:  <input type="text" name="email" value="{{$user->email}}">
  @if($errors->has("email"))
    <p>{{ $errors->first("email") }}</p>
  @endif
  <br>
  名前:   <input type="text" name="name" value="{{$user->name}}">
  @if($errors->has("name"))
    <p>{{ $errors->first("name") }}</p>
  @endif
  <br>
  電話番号:<input type="text" name="phone" value="{{$user->phone}}">
  @if($errors->has("phone"))
    <p>{{ $errors->first("phone") }}</p>
  @endif
  <br>
  郵便番号:<input type="text" name="postcode" value="{{$user->postcode}}">
  <br>
  都道府県：<select name="mtb_prefecture_id">
       <option value="" >選択してください</option>
       @php $selected_prefecture=old('mtb_prefecture_id',$user->mtb_prefecture_id) @endphp
       @foreach($mtb_prefectures as $mtb_prefecture)
           <option value="{{ $mtb_prefecture->id }}" @if($selected_prefecture==$mtb_prefecture->id){{'selected'}}@endif>
               {{ $mtb_prefecture->value }}</option>
       @endforeach
  </select>
  <br>
  住所１:  <input type="text" name="address1" value="{{$user->address1}}">
  <br>
  住所２:  <input type="text" name="address2" value="{{$user->address2}}">
  <br>
  古いパスワード:<input type="password" name="oldpassword" >
  <br>
  新しいパスワード:<input type="password" name="newpassword">
  パスワード確認:<input type="password" name="password_confirmation" >
  <br>
  <input type="submit" name="送信">
</form>

@endsection
