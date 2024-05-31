@extends("layout")
@section("title", "all posts")
@section("content")
    <h1>all posts</h1>
    <div class="col mb-3 d-flex gap-2">
        <a class="btn btn-primary" href="{{ route('posts.create') }}"><i class="bi bi-plus-circle"></i> create new post</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="bi bi-door-closed"></i> logout</button>
        </form>
    </div>
    @foreach ($posts as $post)
        <div class="d-flex align-items-center mb-2">
            <div class="col">
                {{ $post->title }}
            </div>
            <div class="col">
                {{ $post->content }}
            </div>
            <div class="col">
                <div class="d-flex gap-2 justify-content-center">
                    <a class="btn btn-success" href="{{ route('posts.show', $post) }}"><i class="bi bi-eye"></i> view</a>
                    <a class="btn btn-warning" href="{{ route('posts.edit', $post) }}"><i class="bi bi-pen"></i> edit</a>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit"><i class="bi bi-x-circle"></i> delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
@endsection
