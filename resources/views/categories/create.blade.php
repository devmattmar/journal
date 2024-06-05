@extends("components.layout")
@section("title", "create a category")
@section("content")
    <h1 class="mb-3">create category</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">name</label><br/>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" id="name" placeholder="category name">
        </div>
        @error("name")
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"><i class="bi bi-arrow-bar-left"></i> return</a>
            <button class="btn btn-success" type="submit"><i class="bi bi-plus-circle"></i> create</button>
        </div>
    </form>
@endsection
