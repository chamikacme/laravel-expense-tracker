@extends('layout')

@section('content')
    <div class="container px-5">

        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">
                <div class="align-items-center my-2 pb-1">
                    <h2>Register</h2>
                </div>
                <form method="POST" action="/users">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password"
                            value="{{ old('password') }}">
                        @error('password')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="d-grid mt-4">

                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-3">Cancel</a>

                    </div>

                    <p class="mt-2">Already have an account?
                        <a href="/login" class="text-laravel">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
