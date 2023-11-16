@extends('templates.login_template')
@section('content')
    <div class="container">
        <div class="img-container">
            <img src="images/vet clinic.png" class="w-75">
        </div>
        <form method="POST" action="/login_page">
            @csrf
            <div class="form-outline mt-2">
                <input type="text" name="username" id="form3Example3"
                    class="form-control @error('username') is-invalid @enderror" />
                <label class="form-label" for="form3Example3">Username</label>
            </div>
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="form-outline mt-4">
                <input type="password" name="password" id="form3Example3"
                    class="form-control @error('password') is-invalid @enderror" />
                <label class="form-label" for="form3Example3">Password</label>
            </div>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <div class="row text-center">
                <div class="col-mb-4">
                    <button class="btn btn-success" name="submit" type="submit">Login</button>
                </div>
                <div class="col-mb-4">
                    <p>Don't have an account?
                        <a href="/register">Register</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection