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
                <label for="category" class="form-label">category</label>
                <select id="category" class="form-select" name="category_id">
                    <option value="">select category</option>
                    @foreach($categories as $category)
                        <option @selected(old('category_id', $post->category_id) === $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error("category_id")
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            @php
                $tagsIds = $post->tags()->pluck('id');
            @endphp
            <div class="mb-3">
                <label for="tag" class="form-label">tags</label>
                <select id="tag" class="form-select" name="tags[]" multiple>
                    @foreach($tags as $tag)
                        <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            @error("tags")
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
