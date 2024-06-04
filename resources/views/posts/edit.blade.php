@extends("components.layout")
@section("title", "edit post")
@section("content")
    <h1 class="mb-3">edit post {{ $post->id }}</h1>
    @if (isset($post))
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label" for="title">title</label><br/>
                <input class="form-control" type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}" id="title" placeholder="post title">
            </div>
            @error("title")
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="content">content</label><br/>
                <textarea class="form-control" name="content" id="content" rows="20" placeholder="post content">{{ isset($post->content) ? $post->content : old('content') }}</textarea>
            </div>
            @error("content")
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"><i class="bi bi-arrow-bar-left"></i> return</a>
                <button class="btn btn-warning" type="submit"><i class="bi bi-pen"></i> edit</button>
            </div>
        </form>
    @endif
@endsection
