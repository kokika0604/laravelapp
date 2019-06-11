@extends('restaurant.layouts.app',['title'=>'店舗情報'])

@section('content')
        <a href="{{route('get_restaurant_mypage')}}" style="float:right">マイページ</a><br><br>

        @if($info_action=='')
            @include('restaurant.parts.basic_info')
        @endif

        @if($info_action=='edit')
            @include('restaurant.parts.basic_info_edit_form')
        @endif
        <br><br>

        @include('restaurant.parts.pic')

        <br><br>


@endsection
