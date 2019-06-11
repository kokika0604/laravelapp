
<h4><span>*必須項目</span></h4>
<form action="{{route('post_restaurant_info_edit')}}" method="post">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">

  <table class="table table-responsive table-striped table-hover">
    <caption><p style="float:left">店舗情報</p></caption>
    <tr>
      <th  style="width:800">メールアドレス:<span>*</span></th>
      <td  style="width:600"><input type="text" name="email" value="{{old('email',$item->email)}}"></td>
    </tr>
      @if($errors->has('email'))
        <tr><td></td><td><span>{{$errors->first('email')}}</td></tr></span>
      @endif
    <tr>
      <th>店舗名:<span>*</span></th>
      <td><input type="text" name="name" value="{{old('name',$item->name)}}"></td>
    </tr>
    @if($errors->has('name'))
      <tr><td></td><td><span>{{$errors->first('name')}}</td></tr></span>
    @endif
    <tr>
      <th>電話番号:<span>*</span></th>
      <td><input type="text" name="phone1" value="{{old('phone1',substr($item->phone,0,2))}}" style="width:2em">-
          <input type="text" name="phone2" value="{{old('phone2',substr($item->phone,2,4))}}" style="width:4em">-
          <input type="text" name="phone3" value="{{old('phone3',substr($item->phone,6,4))}}" style="width:4em"></td>
    </tr>
    @if($errors->has('phone'))
      <tr><td></td><td><span>{{$errors->first('phone')}}</td></tr></span>
    @endif
    <tr>
      <th>郵便番号:<span>*</span></th>
      <td><input type="text" name="postcode1" value="{{old('postcode1',substr($item->postcode,0,3))}}" style="width:3em">-
          <input type="text" name="postcode2" value="{{old('postcode2',substr($item->postcode,3,4))}}" style="width:4em"></td>
    </tr>
    @if($errors->has('postcode'))
      <tr><td></td><td><span>{{$errors->first('postcode')}}</td></tr></span>
    @endif
    <tr>
      <th>住所（都道府県）:<span>*</span></th>
      <td><select name="mtb_prefecture_id"><option value="">選択してください</option>
        @php $selected_prefecture = old('mtb_prefecture_id',$item->mtb_prefecture_id); @endphp
        @foreach($prefectures as $prefecture)
          <option value="{{$prefecture->id}}" {{ ($selected_prefecture == $prefecture->id) ? "selected" : "" }}>{{$prefecture->value}}</option>
        @endforeach
      </select></td>
    </tr>
    @if($errors->has('mtb_prefecture_id'))
      <tr><td></td><td><span>{{$errors->first('mtb_prefecture_id')}}</td></tr></span>
    @endif
    <tr>
      <th>住所（市区町村）:<span>*</span></th>
      <td><input type="text" name="address1" value="{{old('address1',$item->address1)}}"></td>
    </tr>
    @if($errors->has('address1'))
      <tr><td></td><td><span>{{$errors->first('address1')}}</td></tr></span>
    @endif
    <tr>
      <th>住所（そのほか）:<span>*</span></th>
      <td><input type="text" name="address2" value="{{old('address2',$item->address2)}}"></td>
    </tr>
    @if($errors->has('address2'))
      <tr><td></td><td><span>{{$errors->first('address2')}}</td></tr></span>
    @endif
    <tr>
      <th>営業時間:<span>*</span></th>
      <td><input type="text" name="business_hour" value="{{old('business_hour',$item->business_hour)}}"></td>
    </tr>
    @if($errors->has('business_hour'))
      <tr><td></td><td><span>{{$errors->first('business_hour')}}</td></tr></span>
    @endif
    <tr>
      <th>ランチ予算:</th>
      <td>
          <input type="text" name="lunch_low_cost" value="{{old('lunch_low_cost',$item->lunch_low_cost)}}" style="width:5em">~
          <input type="text" name="lunch_high_cost" value="{{old('lunch_high_cost',$item->lunch_high_cost)}}" style="width:5em">円/人
      </td>
    </tr>
    <tr>
      <th>コース予算:</th>
      <td><input type="text" name="course_low_cost" value="{{old('course_low_cost',$item->course_low_cost)}}" style="width:5em">~
          <input type="text" name="course_high_cost" value="{{old('course_high_cost',$item->course_high_cost)}}" style="width:5em">円/人</td>
    </tr>
    <tr>
      <th>一言アピール:</th>
      <td><textarea name="short_description" rows="1" cols="60" >{{old('short_description',$item->short_description)}}</textarea></td>
    </tr>
    <tr>
      <th>具体的な紹介:</th>
      <td><textarea name="long_description" rows="10" cols="60" >{{old('long_description',$item->long_description)}}</textarea></td>
    </tr>
    <tr>
      <th>カテゴリ:</th>
      <td>
          @php
            $category_ids_db = array();
            foreach($rs_cs as $r_c) {
                $category_ids_db[] = $r_c->category_id;
            }
            $category_ids = old("category_ids", $category_ids_db);
          @endphp

          @foreach($category_info as $parent_category_info)
              <input type="checkbox" name="category_ids[]" value="{{ $parent_category_info['category_id'] }}"
                {{ in_array($parent_category_info['category_id'], $category_ids) ? "checked" : "" }}
              ><strong>{{ $parent_category_info['category_name'] }} </strong>

              @foreach($parent_category_info["children"] as $child_category_info)
                  <input type="checkbox" name="category_ids[]" value="{{ $child_category_info['category_id'] }}"
                    {{ in_array($child_category_info['category_id'], $category_ids) ? "checked" : "" }}
                  >{{ $child_category_info['category_name'] }}
              @endforeach
              <br />
          @endforeach

      </td>
    </tr>
    <tr>
      <th>タグ:</th>
      <td>
          @php
            $tag_ids_db = array();
            foreach($rs_ts as $r_t) {
                $tag_ids_db[] = $r_t->tag_id;
            }
            $tag_ids = old("tags", $tag_ids_db);
          @endphp

        @foreach($tags as $tag)
          <input type="checkbox" name="tags[]" value="{{$tag->id}}"
            {{ in_array($tag->id, $tag_ids) ? "checked" : "" }}
          >{{$tag->name." "}}
        @endforeach
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="送信" style="float:right"></td>
    </tr>
  </table>
</form>
<br>
<a href="{{route('get_restaurant_info')}}" style="float:right">取り消し</a>
<br><br>
