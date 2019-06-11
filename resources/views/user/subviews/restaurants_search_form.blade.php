<div>
    <form action="{{ route('get_homepage') }}" method="get">
        @csrf
        <input type="text" name="keyword" value="{{ app('request')->input('keyword') }}" placeholder="店舗を探す" />
        <hr>
        @foreach($categories as $category)
          <input type="checkbox" name="category_ids[]" value="{{ $category->id }}">{{ $category->name }}
        @endforeach
        <hr>
        @foreach($tags as $tag)
          <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}">{{ $tag->name }}
        @endforeach
        <hr>
        <input type="submit"  value="search">
    </form>
</div>
