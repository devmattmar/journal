@extends("components.layout")

@section("title", "Edit Post")

@section("content")
    <h1 class="mb-4">Edit Post #{{ $post->id }}</h1>

    @if (isset($post))
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @method('PUT')
            @csrf

            <div class="mb-4">
                <label class="form-label" for="title">Title</label>
                <input
                    class="form-control @error('title') is-invalid @enderror"
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $post->title) }}"
                    placeholder="Enter post title"
                >
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="category">Category</label>
                <select
                    id="category"
                    class="form-select @error('category_id') is-invalid @enderror"
                    name="category_id"
                >
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="tags">Tags</label>
                <select
                    id="tags"
                    class="form-select @error('tags') is-invalid @enderror"
                    name="tags[]"
                    multiple
                >
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="content">Content</label>
                <textarea
                    class="form-control @error('content') is-invalid @enderror"
                    name="content"
                    id="content"
                    rows="10"
                    placeholder="Enter post content"
                >{{ old('content', $post->content) }}</textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}">
                    <i class="bi bi-arrow-bar-left"></i> Return
                </a>
                <button class="btn btn-warning" type="submit">
                    <i class="bi bi-pen"></i> Save Changes
                </button>
            </div>
        </form>
    @endif
@endsection
