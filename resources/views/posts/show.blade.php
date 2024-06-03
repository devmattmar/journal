@extends("layout")
@section("title", $post->title)
@section("content")
    <h1 class="mb-3">{{ $post->title }}</h1>
    <div class="col-12 mb-3">
        {{ $post->content }}
    </div>
    <div class="col-12 mb-3">
        <a class="btn btn-primary" href="{{ route('posts.index') }}">Return to posts</a>
    </div>
@endsection
