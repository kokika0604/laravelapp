@extends('restaurant.layouts.app',['title'=>'メニュー'])
@section('content')
    <a href="{{route('get_restaurant_mypage')}}" style="float:right">マイページ</a><br><br>

    @if (count($item->menus)>0)
        <table class="table table-responsive table-striped table-hover" style="width:1000">
            <caption><p style="float:left">メニュー一覧</p></caption>
            <tr>
                <th style="width:20%">画像</th>
                <th style="width:12%">料理名</th>
                <th style="width:12%">価格（円）</th>
                <th style="width:12%">税込み</th>
                <th style="width:20%">説明</th>
                <th style="width:12%"> </th>
                <th style="width:12%"></th>
            </tr>

            @foreach($item->menus as $menu)

                @if(isset($action) and $action=='edit' and $request->id==$menu->id)
                    @include('restaurant.parts.menu_edit_form')
                @else
                <tr style="height:120">
                    <td>@isset($menu->pic)<img src="{{URL::asset("storage/$menu->pic")}}" style="width:140;height:100" onclick='show(this)'>@else{{"なし"}}@endif</td>
                    <td>{{$menu->name}}</td>
                    <td>{{$menu->price}}</td>
                    <td>{{$menu->tax_excluded_flg=='0'?'はい':'いえ'}}</td>
                    <td>{{$menu->description}}</td>
                    <td><a href="{{route('get_restaurant_menu_edit',['id'=>$menu->id])}}">編集</a></td>
                    <td><a href="{{route('get_restaurant_menu_delete',['id'=>$menu->id])}}">削除</a></td>
                </tr>
                @endif

            @endforeach

        </table>
    @else
        <h4>結果なし</h4>
    @endif
    <a href="{{route('get_restaurant_menu_add')}}" style="float:right">+追加</a><br>


    @if (isset($action) and $action=='add')
        @include('restaurant.parts.menu_add_form')
    @endif
    <br>





@endsection
