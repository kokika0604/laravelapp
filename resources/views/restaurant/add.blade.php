@extends('restaurant.layouts.app',['title'=>'店舗新規登録'])

@section('content')
<p><span>*必須項目</span></p>
<form action="{{route('post_restaurant_add')}}" method="post">
  @csrf
  <table class="table table-responsive table-striped table-hover">
    <tr>
      <th  style="width:800">メールアドレス:<span>*</span></th>
      <td  style="width:600"><input type="text" name="email" value="{{old('email')}}"></td>
    </tr>
      @if($errors->has('email'))
        <tr><td></td><td><span>{{$errors->first('email')}}</td></tr></span>
      @endif
    <tr>
      <th>店舗名:<span>*</span></th>
      <td><input type="text" name="name" value="{{old('name')}}"></td>
    </tr>
    @if($errors->has('name'))
      <tr><td></td><td><span>{{$errors->first('name')}}</td></tr></span>
    @endif
    <tr>
      <th>電話番号:<span>*</span></th>
      <td><input type="text" name="phone1" value="{{old('phone1')}}" style="width:2em">-
          <input type="text" name="phone2" value="{{old('phone2')}}" style="width:4em">-
          <input type="text" name="phone3" value="{{old('phone3')}}" style="width:4em"></td>
    </tr>
    @if($errors->has('phone'))
      <tr><td></td><td><span>{{$errors->first('phone')}}</td></tr></span>
    @endif
    <tr>
      <th>郵便番号:<span>*</span></th>
      <td><input type="text" name="postcode1" value="{{old('postcode1')}}" style="width:3em">-
          <input type="text" name="postcode2" value="{{old('postcode2')}}" style="width:4em"></td>
    </tr>
    @if($errors->has('postcode'))
      <tr><td></td><td><span>{{$errors->first('postcode')}}</td></tr></span>
    @endif
    <tr>
      <th>住所（都道府県）:<span>*</span></th>
      <td><select name="mtb_prefecture"><option value="">選択してください</option>
        <?php $selected_pre=old('mtb_prefecture','');?>
        @foreach($items as $item)
          <option value="{{$item->id}}" <?php if($selected_pre==$item->id){echo 'selected';}?> >{{$item->value}}</option>
        @endforeach
      </select></td>
    </tr>
    @if($errors->has('mtb_prefecture'))
      <tr><td></td><td><span>{{$errors->first('mtb_prefecture')}}</td></tr></span>
    @endif
    <tr>
      <th>住所（市区町村）:<span>*</span></th>
      <td><input type="text" name="address1" value="{{old('address1')}}"></td>
    </tr>
    @if($errors->has('address1'))
      <tr><td></td><td><span>{{$errors->first('address2')}}</td></tr></span>
    @endif
    <tr>
      <th>住所（そのほか）:<span>*</span></th>
      <td><input type="text" name="address2" value="{{old('address2')}}"></td>
    </tr>
    @if($errors->has('address2'))
      <tr><td></td><td><span>{{$errors->first('address2')}}</td></tr></span>
    @endif
    <tr>
      <th>営業時間:<span>*</span></th>
      <td><input type="text" name="business_hour" value="{{old('business_hour')}}"></td>
    </tr>
    @if($errors->has('business_hour'))
      <tr><td></td><td><span>{{$errors->first('business_hour')}}</td></tr></span>
    @endif
    <tr>
      <th>パスワード:<span>*</span></th>
      <td><input type="password" name="password"></td>
    </tr>
    @if($errors->has('password'))
      <tr><td></td><td><span>{{$errors->first('password')}}</td></tr></span>
    @endif
    <tr>
      <th>もう一度入力してください: <span>*</span></th>
      <td><input type="password" name="password_confirmation"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="送信"></td>
    </tr>
  </table>
</form>






@endsection
