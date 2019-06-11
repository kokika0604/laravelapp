<div class="col-xs-6 col-sm-3" style="background-color: #dedef8;box-shadow: inset 1px -1px 1px #444,inset -1px 1px 1px #444;margin-top:1px; padding-top:8px">
    @php $main_pic=null @endphp
    @foreach($restaurant->pics as $pic)
       @if($pic->main_flg=='1')
           @php $main_pic=$pic->pic @endphp
       @endif
    @endforeach
        <img src="{{ asset("storage/$main_pic") }}" alt="restaurant_pics" width="200" height="150">
    </a>
    <table>
    <tr>
        <th>店名</th>
        <td>{{$restaurant->name}}</td>
    </tr>
    <tr>
      <th>ランチ予算</th>
      <td>
          {{$restaurant->lunch_low_cost}} ~ {{$restaurant->lunch_high_cost}}円/人
      </td>
    </tr>
    <tr>
      <th>コース予算</th>
      <td>
          {{$restaurant->course_low_cost}} ~ {{$restaurant->course_high_cost}}円/人
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

        @php $ratings=array(); @endphp
        @foreach($restaurant->reviews as $review)
            @if($review->deleted_at==null)
                @php $ratings[]=$review->rating;@endphp
            @endif
        @endforeach

        <td>{{count($ratings)>0?substr(array_sum($ratings)/count($ratings),0,3):'なし'}}</td>
    </tr>
</table>
</div>
