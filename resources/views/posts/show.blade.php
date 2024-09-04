@extends("components.layout")

@section("title", $post->title)

@section("content")
    <div class="post-header mb-4">
        <h1 class="display-4">{{ $post->title }}</h1>
        <div class="text-muted">
            <span>By {{ $post->author }}</span> |
            <span>{{ $post->created_at->format('F j, Y \a\t g:i A') }}</span>
        </div>
    </div>

    <div class="post-content mb-4">
        {!! $post->markdown($post->content) !!}
    </div>

    <div class="post-footer">
        <a class="btn btn-primary" href="{{ route('posts.index') }}">
            <i class="bi bi-arrow-bar-left"></i> Return to Posts
        </a>
    </div>
@endsection
