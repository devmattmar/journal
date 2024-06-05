@extends("components.layout")

@section("title", "All Posts")

@section("content")
    @if ( session('success') )
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col d-flex justify-content-between align-items-center">
            <h1 class="mb-0">All Posts</h1>
            <div class="d-flex gap-2">
                <a class="btn btn-success" href="{{ route('posts.create') }}">
                    <i class="bi bi-plus-circle"></i> Create new post
                </a>
                <a class="btn btn-success" href="{{ route('categories.create') }}">
                    <i class="bi bi-plus-circle"></i> Create new category
                </a>
                <a class="btn btn-success" href="{{ route('tags.create') }}">
                    <i class="bi bi-plus-circle"></i> Create new tag
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <i class="bi bi-door-closed"></i> Logout {{ auth()->user()->name }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <div class="form-text">{{ $post->author }}</div>
                        <div class="form-text">{{ $post->category?->name }}</div>
                        @foreach($post->tags as $tag)
                            <div class="badge bg-secondary">{{ $tag->name }}</div>
                        @endforeach
                        <div class="form-text">{{ $post->created_at }}</div>
                    </div>
                    <div class="card-body">
                        {{ Str::limit($post->content, 100) }}
                    </div>
                    <div class="card-footer">
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a class="btn btn-warning" href="{{ route('posts.edit', $post) }}">
                                <i class="bi bi-pen"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-x-circle"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
@endsection
