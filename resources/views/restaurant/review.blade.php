@extends('restaurant.layouts.app',['title'=>'レビュー'])

@section('content')



      <a href="{{route('get_restaurant_mypage')}}" style="float:right">マイページ</a><br><br>

      <h2>平均レーティング：{{substr($avg_rating,0,3)}} 点 ({{$count_ratings}} 件)</h2><br><br>


        <h3 style="float:left;margin:0;padding-bottom:10px;border-bottom:solid #D3D3D3">レビュー({{$count_reviews}}件)</h3>
        <select style="float:right" onchange="window.location=this.value">
            <option value="{{route('get_restaurant_review',['order'=>null])}}">新しい順</option>
            <option value="{{route('get_restaurant_review',['order'=>'highRating'])}}" @if($order=='highRating'){{'selected'}}@endif>レーティングの高い順</option>
            <option value="{{route('get_restaurant_review',['order'=>'lowRating'])}}" @if($order=='lowRating'){{'selected'}}@endif>レーティングの低い順</option>
        </select>

        <br><br><br><br>

        @foreach($reviews as $review)
            <div style="border-bottom:solid #D3D3D3;margin-bottom:20px;padding-bottom:20px">
                  <h4>{{$review->user->name}}さん</h4>
                  @for($i=1;$i<=$review->rating;$i++)
                      <img src="{{asset('local/star.png')}}" height="15" >
                  @endfor
                  <p style="color:grey">{{date('Y/m/d H:i',strtotime($review->created_at))}}</p>
                  <h4>{{$review->review}}</h4>
            </div>
        @endforeach
        {{$reviews->links()}}

@endsection
