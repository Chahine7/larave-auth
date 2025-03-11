@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-3">
                    <h4 class="mb-0">{{ __('Login') }}</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 position-relative">
                            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control rounded-end @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                            </div>
                            @error('email')
                                <div class="text-danger mt-1 small"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-4 position-relative">
                            <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                <input id="password" type="password" class="form-control rounded-end @error('password') is-invalid @enderror" 
                                       name="password" required placeholder="Enter your password">
                            </div>
                            @error('password')
                                <div class="text-danger mt-1 small"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-4 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="text-primary text-decoration-none small" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection