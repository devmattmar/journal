@extends("components.layout")
@section("title", "sign in")
@section("content")
    <h1 class="mb-3 text-center">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        @if ( session('success') )
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @error("email")
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label" for="title">email</label><br/>
            <input class="form-control" type="email" name="email" id="email" placeholder="contact@email.fr" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">password</label><br/>
            <input class="form-control" type="password" name="password" id="password" placeholder="password" required>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('register') }}"><i class="bi bi-person-fill-up"></i> register</a>
            <button class="btn btn-success" type="submit"><i class="bi bi-door-open-fill"></i> sign in</button>
        </div>
    </form>
@endsection
