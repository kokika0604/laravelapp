<form action="{{route('post_restaurant_menu_edit',['id'=>$menu->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$menu->id}}">

        @csrf
        <tr style="height:120">
            <td>@isset($menu->pic)<img src="{{URL::asset("storage/$menu->pic")}}" style="width:140;height:100" onclick='show(this)'>@else{{'なし'}}@endif</td>
            <td><input type="text" name="name" value="{{old('name',$menu->name)}}" style="width:100"/></td>
            <td><input type="text" name="price" value="{{old('price',$menu->price)}}" style="width:100"/></td>
            <td><select name="tax_excluded_flg" >
                @php $selected_flg=old("tax_excluded_flg",$menu->tax_excluded_flg) @endphp
                <option value="0" @if($selected_flg=='0'){{'selected'}}@endif>はい</option>
                <option value="1" @if($selected_flg=='1'){{'selected'}}@endif>いえ</option></selected>
            </td>
            <td><textarea name="description">{{old('description',$menu->description)}}</textarea></td>
            <td><input type="file" name="pic" style="width:100"/>
            <td><input type="submit" value="保存"></td>
        </tr>

        @if (count($errors)>0)
            <tr><td colspan='7'>
            @foreach($errors->all() as $error)
                {{$error." "}}
            @endforeach
            </td></tr>
        @endif
</form>
