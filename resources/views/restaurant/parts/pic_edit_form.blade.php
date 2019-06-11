<form action="{{route('post_restaurant_pic_edit',['id'=>$pic->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$pic->id}}">

        @csrf
        <tr style="height:150">
            <td ><img src="{{URL::asset("storage/$pic->pic")}}" style="width:180;height:140" onclick='show(this)'></td>
            <td>
                <select name="rank"><option value="">未選択</option>
                @php $selected_rank=old('rank',$pic->rank) @endphp
                @for($i=1;$i<=5;$i++)
                    <option value="{{$i}}" @if($selected_rank==$i){{'selected'}}@endif>{{$i}}</option>
                @endfor
                </select>
            </td>
            <td><select name="main_flg">
                @php $selected_main_flg=old("main_flg",$pic->main_flg) @endphp
                <option value="0" @if($selected_main_flg=='0'){{'selected'}}@endif>いえ</option>
                <option value="1" @if($selected_main_flg=='1'){{'selected'}}@endif>はい</option></selected>
            </td>
            <td><input type="file" name="pic"/></td>
            <td><input type="submit" value="保存"></td>
        </tr>

        @if (count($errors)>0)
            <tr><td colspan='6'>
            @foreach($errors->all() as $error)
                {{$error." "}}
            @endforeach
            </td></tr>
        @endif
</form>
