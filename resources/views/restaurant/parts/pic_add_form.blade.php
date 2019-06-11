<form action="{{route('get_restaurant_pic_add')}}" method="post" enctype="multipart/form-data">
    <table class="table table-responsive table-striped table-hover">
        @csrf
        <tr>
            <td ><input type="file" name="pic" ></td>
            <td>
                ランク：<select name="rank"><option value="">未選択</option>
                @for($i=1;$i<=5;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
                </select>
            </td>
            <td>メイン画像：<select name="main_flg"><option value="0" selected>いえ</option><option value="1">はい</option></selected></td>
            <td><input type="submit" value="保存"></td>
        </tr>
    </table>
</form>
    @if (count($errors)>0)
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
