@extends("layout")
@section("title", "sign in")
@section("content")
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="title">email</label><br/>
            <input class="form-control" type="email" name="email" id="email" placeholder="contact@email.fr" required>
        </div>
        @error("title")
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label" for="title">password</label><br/>
            <input class="form-control" type="password" name="password" id="password" placeholder="password" required>
        </div>
        @error("title")
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <button class="btn btn-success" type="submit"><i class="bi bi-gear-wide-connected"></i> connect</button>
    </form>
@endsection
