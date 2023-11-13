@extends('templates.register_template')

@section('content')
    <div class="container">
        <div class="img-container">
            <img src="images/vet clinic.png" class="w-75">
        </div>
        <form action="/usercreated" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="firstname" value="{{ old('firstname') }}" id="form3Example1"
                            class="form-control @error('firstname') is-invalid @enderror" />
                        <label class="form-label" for="form3Example1">First name</label>
                    </div>
                    @error('firstname')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="lastname" value="{{ old('lastname') }}" id="form3Example2"
                            class="form-control @error('lastname') is-invalid @enderror" />
                        <label class="form-label" for="form3Example2">Last name</label>
                    </div>
                    @error('lastname')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- User Type input (hidden) -->
            <input type="hidden" name="user_type" value="user">

            <!-- Username input -->
            <div class="form-outline mt-2">
                <input type="text" name="username" value="{{ old('username') }}" id="form3Example3"
                    class="form-control @error('username') is-invalid @enderror" />
                <label class="form-label" for="form3Example3">Username</label>
            </div>
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <!-- Password input -->
            <div class="form-outline mt-2">
                <input type="password" name="password" value="{{ old('password') }}" id="form3Example3"
                    class="form-control @error('password') is-invalid @enderror" />
                <label class="form-label" for="form3Example3">Password</label>
            </div>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <!-- Confirm Password input -->
            <div class="form-outline mt-2">
                <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" id="form3Example4"
                    class="form-control @error('confirm_password') is-invalid @enderror" />
                <label class="form-label" for="form3Example4">Confirm Password</label>
            </div>
            @error('confirmpass')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <!-- Register buttons -->
            <div class="row text-center">
                <div class="col-mb-4">
                    <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
                </div>
                <input type="hidden" name="profile" value="default_profile_value">

                <div class="col-mb-4">
                    <p>Already have an account?
                        <a href="/login_page">Login</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection
