@extends('layouts.app')
@section('body')

<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center text-primary fw-bold">Register</h5>
            </div>
            <div class="card-body">
                <x-alert />
                <form action="{{ route('register.registration') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password_confirmation" class="form-label fw-bold">Password confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3 form-control">Register</button>
                </form>
                <div class="text-center mt-3">
                    Belum mempunyai akun? <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection