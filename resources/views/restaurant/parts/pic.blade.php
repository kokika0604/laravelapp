    @if (count($item->pics)>0)
        <table class="table table-responsive table-striped table-hover" style="width:1000">
            <caption><p style="float:left">店舗写真</p></caption>
            <thead>
                <tr>
                    <th style="width:30%">画像</th>
                    <th style="width:20%">ランク</th>
                    <th style="width:20%">メイン画像</th>
                    <th style="width:15%"></th>
                    <th style="width:15%"></th>
                </tr>
            </thead>
            <tbody id="sortable">

                @foreach($item->pics as $pic)

                    @if(isset($pic_action) and $pic_action=='edit' and $request->id==$pic->id)
                        @include('restaurant.parts.pic_edit_form')
                    @else


                    <tr  style="height:150">
                        <td style="width:300"><img src="{{URL::asset("storage/$pic->pic")}}" style="width:180;height:140" onclick='show(this)'></td>
                        <td style="width:200">{{$pic->rank}}</td>
                        <td style="width:200">{{$pic->main_flg=='1'?'はい':'いえ'}}</td>
                        <td style="width:150"><a href="{{route('get_restaurant_pic_edit',['id'=>$pic->id])}}">編集</a></td>
                        <td style="width:150"><a href="{{route('get_restaurant_pic_delete',['id'=>$pic->id])}}">削除</a></td>
                    </tr>


                    @endif

                @endforeach

            </tbody>
        </table>
    @else
        <h4>結果なし</h4>
    @endif
    <a href="{{route('get_restaurant_pic_add')}}" style="float:right">+写真を追加</a><br>


    @if (isset($pic_action) and $pic_action=='add')
        @include('restaurant.parts.pic_add_form')
    @endif
    <br>
