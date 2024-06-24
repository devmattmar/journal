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

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" style="width: 5%">id</th>
                <th scope="col" style="width: 10%">title</th>
                <th scope="col" style="width: 10%">author</th>
                <th scope="col" style="width: 10%">category</th>
                <th scope="col" style="width: 10%">tags</th>
                <th scope="col" style="width: 20%">created at</th>
                <th scope="col" style="width: 20%">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="align-middle">
                        {{$post->id}}
                    </td>
                    <td class="align-middle">
                        {{$post->title}}
                    </td>
                    <td class="align-middle">
                        {{$post->author}}
                    </td>
                    <td class="align-middle">
                        {{$post->category?->name}}
                    </td>
                    <td class="align-middle">
                        @foreach($post->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </td>
                    <td class="align-middle">
                        {{$post->created_at}}
                    </td>
                    <td class="d-flex gap-2">
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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $posts->links() }}
    </div>
@endsection
