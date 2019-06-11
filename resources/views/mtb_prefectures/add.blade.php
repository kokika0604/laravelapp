<html>
<body>
@if (count($errors)>0)
  @foreach($errors->all() as $error)
    <p>{{$error}}</p>
  @endforeach
@endif

<table>
  <form action="/prefecture/add" method="POST">
    {{csrf_field()}}
    value:<input type="text" name="value" value="{{old('value')}}"><br>
    rank:<input type="number" name="rank" value="{{old('rank')}}"><br>
    <input type="submit">
  </form>



</body>
</html>
