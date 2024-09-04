@extends("components.layout")

@section("title", "All Posts")

@section("content")

    @if (session('success'))
        <div class="mb-3">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            <strong>Author:</strong> {{ $post->author }} <br>
                            <strong>Category:</strong> {{ $post->category?->name ?? 'Uncategorized' }} <br>
                            <strong>Tags:</strong>
                            @foreach($post->tags as $tag)
                                <span class="badge bg-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <p class="card-text mt-auto">
                            <small class="text-muted">Created at: {{ $post->created_at }}</small>
                        </p>
                    </div>
                    <div class="card-footer d-flex gap-2">
                        <a class="btn btn-primary w-100" href="{{ route('posts.show', $post) }}">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a class="btn btn-warning w-100" href="{{ route('posts.edit', $post) }}">
                            <i class="bi bi-pen"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit">
                                <i class="bi bi-x-circle"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
@endsection
