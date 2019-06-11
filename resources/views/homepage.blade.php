
@extends('restaurant.layouts.app',['title'=>'ホーム'])

@section('content')

    <div>

        <div>
            <form action="{{ route('get_homepage') }}" method="get">
                @csrf
                <input type="text" name="keyword" value="{{ app('request')->input('keyword') }}" placeholder="店舗を探す" /><br>
                <b>カテゴリ：</b>
                @foreach($categories as $category)
                  <input type="checkbox" name="category_ids[]" value="{{ $category->id }}">{{ $category->name }}
                @endforeach
                <br>
                <b>タグ：</b>
                @foreach($tags as $tag)
                  <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}">{{ $tag->name }}
                @endforeach
                <br>
                <input type="submit"  value="search">
            </form>
        </div>


              <div class="container">
                  <div class="row" >
                      @foreach ($restaurants as $restaurant)
                          <div class="col-xs-6 col-sm-3" style="background-color: #dedef8;box-shadow: inset 1px -1px 1px #444,inset -1px 1px 1px #444;margin-top:1px; padding-top:8px">
                              <div style="height:200;width:200;margin:20px">
                                  <a href="">
                                      @php $picaddress="local/nothing.jpg";@endphp
                                      @isset($restaurant->pics)
                                          @foreach($restaurant->pics as $pic)
                                              @if($pic->main_flg=='1')
                                                  @php $picaddress=$pic->pic; @endphp
                                              @endif
                                          @endforeach
                                      @endif
                                    <img src="{{asset("storage/$picaddress")}}" alt="restaurant_pics" width="100%">
                                  </a>
                              </div>
                              <table>
                                  <tr>
                                      <th>店名</th>
                                      <td>{{$restaurant->name}}</td>
                                  </tr>
                                  <tr>
                                    <th>ランチ予算</th>
                                    <td>{{$restaurant->lunch_low_cost}} ~ {{$restaurant->lunch_high_cost}}円/人</td>
                                  </tr>
                                  <tr>
                                    <th>コース予算</th>
                                    <td>{{$restaurant->course_low_cost}} ~ {{$restaurant->course_high_cost}}円/人
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>タグ</th>
                                    <td>
                                      @foreach($restaurant->tags as $tag)
                                        {{$tag->name}}
                                      @endforeach
                                    </td>
                                  </tr>
                                  <tr>
                                      <th>評価</th>
                                      <td>{{substr($restaurant->reviews->avg('rating'),0,3)}}</td>
                                  </tr>
                          </table>
                      </div>

                      @endforeach
                  </div>
              </div>

              {{ $restaurants->links() }}


              {{-- <ul>
                  @foreach($categories as $category)
                  <li><a href="{{ route('get_homepage') }}?category_ids[]={{ $category->id }}">{{ $category->name }}</a></li>
                  @endforeach
              </ul> --}}
   </div>















@endsection
