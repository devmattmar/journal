@extends("components.layout")

@section("title", "Sign In")

@section("content")
    <h1 class="mb-4 text-center">Sign In</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @error('email')
        <div class="alert alert-danger">
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
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

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
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a class="btn btn-secondary" href="{{ route('register') }}">
                <i class="bi bi-person-fill-up"></i> Register
            </a>
            <button class="btn btn-success" type="submit">
                <i class="bi bi-door-open-fill"></i> Sign In
            </button>
        </div>
    </form>
@endsection
