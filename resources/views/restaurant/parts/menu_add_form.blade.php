<form action="{{route('get_restaurant_menu_add')}}" method="post" enctype="multipart/form-data">
    <table class="table table-responsive table-striped table-hover" style="width:400">
        @csrf
        <script type="text/javascript">
            function previewFile() {
                var preview = document.getElementsByClassName('preview')[0];
                var file    = document.querySelector('input[type=file]').files[0];
                var reader  = new FileReader();

                reader.onloadend = function () {
                preview.src = reader.result;
                }

                if (file) {
                reader.readAsDataURL(file);
                preview.style.display= "block";
                } else {
                preview.src = "";
                }
            }
        </script>
        <tr>
            <td>画像：</td>
            <td><input type="file" name="pic" onchange="previewFile()"><br>
                <img class='preview' src="" height="150" width="200"  onclick='show(this)' style="display:none"></td>
        </tr>
        <tr>
            <td>料理名：</td>
            <td><input type="text" name="name" /></td>
        </tr>
        <tr>
            <td>価格：</td>
            <td><input type="text" name="price" />円
                税込み：<input type="checkbox" name="tax_included" value="1" checked>
            </td>
        </tr>
        <tr>
            <td>説明：</td>
            <td><textarea name="description" rows="3" cols="30"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="保存"></td>
        </tr>
    </table>
</form>
    @if (count($errors)>0)
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
