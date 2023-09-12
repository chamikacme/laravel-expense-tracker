@extends('layout')

@section('content')
    <div class="container px-5">

        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">
                <div class="align-items-center my-2 pb-1">
                    <h2>Edit Profile</h2>
                </div>
                <form method="POST" action="/profile/update">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email"
                            value="{{ $user->email }}">
                        @error('email')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="d-grid mt-4">

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/profile" class="btn btn-outline-primary mt-3">Cancel</a>

                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
