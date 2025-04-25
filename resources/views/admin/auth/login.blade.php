@extends('admin.auth.body.main')

@section('container')

{{-- <div class="d-flex justify-content-center align-items-center min-vh-100 px-4 bg-white">
    <div class="card shadow-sm p-4 bg-white" style="max-width: 400px; width: 100%;">
        <h1 class="text-center mb-4">Login</h1>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email/Username</label>
                    <input class="form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror" type="text" name="input_type" placeholder="username" value="{{ old('input_type') }}" autocomplete="off" required autofocus>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Email/Username</label>
                            <input class="form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror" type="text" name="input_type" placeholder="username" value="{{ old('input_type') }}" autocomplete="off" required autofocus>
                        </div>
                        @error('username')
                        <div class="mb-4" style="margin-top: -20px">
                            <div class="text-danger small">Incorrect username or password.</div>
                        </div>
                        @enderror
                        @error('email')
                        <div class="mb-4" style="margin-top: -20px">
                            <div class="text-danger small">Incorrect username or password.</div>
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror" type="password" name="password" placeholder=" " required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Sign In</button>
            </form>
        
            <p class="mt-3 text-center">
                Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign up</a>
            </p>

    </div>
</div> --}}

<div class="d-flex justify-content-center align-items-center min-vh-100 px-4 bg-white">
    <div class="card shadow-sm p-4 bg-white" style="max-width: 400px; width: 100%;">
        <h1 class="text-center mb-4">Login</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email/Username -->
            <div class="form-group">
                <label for="input_type">Email/Username</label>
                <input 
                    id="input_type" 
                    class="form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror" 
                    type="text" 
                    name="input_type" 
                    placeholder="Enter your email or username" 
                    value="{{ old('input_type') }}" 
                    autocomplete="off" 
                    required 
                    autofocus
                />
                @error('email')
                    <div class="text-danger small mt-2">Incorrect email or password.</div>
                @enderror
                @error('username')
                    <div class="text-danger small mt-2">Incorrect username or password.</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    id="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    type="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    required
                />
                @error('password')
                    <div class="text-danger small mt-2">Password is incorrect.</div>
                @enderror
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="btn btn-warning w-100">Sign In</button>
        </form>

        <!-- Sign Up Link -->
        <p class="mt-3 text-center">
            Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign up</a>
        </p>
    </div>
</div>

@endsection
