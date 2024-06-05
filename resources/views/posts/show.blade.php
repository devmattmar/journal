@extends("components.layout")
@section("title", $post->title)
@section("content")
    <div class="col-12 mb-3">
        <h1>{{ $post->title }}</h1>
        <div class="form-text">{{ $post->author }}</div>
        <div class="form-text">{{ $post->created_at }}</div>
    </div>
    <div class="col-12 mb-3">
        {!! $post->markdown($post->content) !!}
    </div>
    <div class="col-12 mb-3">
        <a class="btn btn-primary" href="{{ route('posts.index') }}"><i class="bi bi-arrow-bar-left"></i> return</a>
    </div>
@endsection
