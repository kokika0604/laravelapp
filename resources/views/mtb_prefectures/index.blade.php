<html>
<body>
  <table>
    <tr>
      <th>no.</th>
      <th>name</th>
      <th>rank</th>
    </tr>

      @foreach ($items as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->value}}</td>
          <td>{{$item->rank}}</td>
        </tr>
      @endforeach


    </table>
</body>
</html>
