@extends("components.layout")

@section("title", "Register")

@section("content")
    <h1 class="mb-4 text-center">Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @error('name')
        <div class="alert alert-danger mb-3">
            {{ $message }}
        </div>
        @enderror

        <div class="mb-4">
            <label class="form-label" for="name">Name</label>
            <input
                class="form-control @error('name') is-invalid @enderror"
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="Enter your name"
                required
            >
        </div>

        @error('email')
        <div class="alert alert-danger mb-3">
            {{ $message }}
        </div>
        @enderror

        <div class="mb-4">
            <label class="form-label" for="email">Email</label>
            <input
                class="form-control @error('email') is-invalid @enderror"
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                placeholder="contact@example.com"
                required
            >
        </div>

        @error('password')
        <div class="alert alert-danger mb-3">
            {{ $message }}
        </div>
        @enderror

        <div class="mb-4">
            <label class="form-label" for="password">Password</label>
            <input
                class="form-control @error('password') is-invalid @enderror"
                type="password"
                name="password"
                id="password"
                placeholder="Enter your password"
                required
            >
            <div id="passwordHelp" class="form-text">8 characters minimum.</div>
        </div>

        <div class="d-flex justify-content-between">
            <a class="btn btn-secondary" href="{{ route('login') }}">
                <i class="bi bi-door-open-fill"></i> Sign In
            </a>
            <button class="btn btn-success" type="submit">
                <i class="bi bi-person-fill-up"></i> Register
            </button>
        </div>
    </form>
@endsection
