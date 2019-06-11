<html>
<body>

  @isset($items)
    <table>
      @foreach ($items as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->value}}</td>
        <td>{{$item->rank}}</td>
      </tr>
    @endforeach
    </table>
  @endif
  <form action="/prefecture/find" method="POST">
    {{csrf_field()}}
    id:<input type="text" name="id" value="{{$id}}">
    <input type="submit">
  </form>
 
</body>
</html>
