@extends("layout")
@section("title", "register")
@section("content")
    <h1 class="mb-3">Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">name</label><br/>
            <input class="form-control" type="text" name="name" id="name" placeholder="name" required>
        </div>
        @error("name")
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label" for="title">email</label><br/>
            <input class="form-control" type="email" name="email" id="email" placeholder="contact@email.fr" required>
        </div>
        @error("email")
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label" for="title">password</label><br/>
            <input class="form-control" type="password" name="password" id="password" placeholder="password" required>
        </div>
        @error("password")
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('login') }}"><i class="bi bi-arrow-bar-left"></i> sign in</a>
            <button class="btn btn-success" type="submit"><i class="bi bi-gear-wide-connected"></i> register</button>
        </div>
    </form>
@endsection
