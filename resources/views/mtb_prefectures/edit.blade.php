<html>
<body>

@if (count($errors)>0)
  @foreach($errors->all() as $error)
    <p>{{$error}}</p>
  @endforeach
@endif

<table>
  <form action="/prefecture/edit" method="POST">
    {{csrf_field()}}
    <input type="hidden" name='id' value='{{$form->id}}'>
    value:<input type="text" name="value" value="{{old('value', $form->value)}}"><br>
    rank:<input type="text" name="rank" value="{{old('rank',$form->rank)}}"><br>
    <input type="submit">
  </form>



</body>
</html>
