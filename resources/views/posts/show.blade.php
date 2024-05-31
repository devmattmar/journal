@extends("layout")
@section("title", $post->title)
@section("content")
    <div class="col-12">
        <h1>{{ $post->title }}</h1>
    </div>
    <div class="col-12">
        {{ $post->content }}
    </div>
    <div class="col-12">
        <a class="btn btn-primary" href="{{ route('posts.index') }}">Return to posts</a>
    </div>
@endsection
