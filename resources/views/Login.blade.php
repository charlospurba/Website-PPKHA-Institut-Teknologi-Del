<!-- login.blade.php -->
@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="SMA N 1 Balige Logo"
                    style="width: 130px; height: auto;">
                <h4>SIK IT Del</h4>
            </div>

            <form method="POST" action="{{ route('post.login') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="email">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">Kata Sandi</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group form-check text-start">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Ingat Saya
                    </label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
