@extends('templates.login_template')
@section('content')
    <div class="container">
        <div class="img-container">
            <img src="images/vet clinic.png" class="w-75">
        </div>
        <form action="" method="POST">
            @csrf

            <div class="form-outline mt-2">
                <input type="text" name="username" value="{{ old('username') }}" id="form3Example3"
                    class="form-control @error('username') is-invalid @enderror" />
                <label class="form-label" for="form3Example3">Username</label>
            </div>
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="form-outline mt-4">
                <input type="password" name="password" value="{{ old('password') }}" id="form3Example3"
                    class="form-control @error('password') is-invalid @enderror" />
                <label class="form-label" for="form3Example3">Password</label>
            </div>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <div class="row text-center">
                <div class="col-mb-4">
                    <a href="/home"><button class="btn btn-success" name="login" type="submit">Login</button></a>
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
