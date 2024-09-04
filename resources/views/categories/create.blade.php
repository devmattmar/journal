@extends("components.layout")

@section("title", "Create a Category")

@section("content")
    <h1 class="mb-4">Create Category</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="mb-4">
            <label class="form-label" for="name">Name</label>
            <input
                class="form-control @error('name') is-invalid @enderror"
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="Enter category name"
            >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}">
                <i class="bi bi-arrow-bar-left"></i> Return
            </a>
            <button class="btn btn-success" type="submit">
                <i class="bi bi-plus-circle"></i> Create
            </button>
        </div>
    </form>
@endsection
