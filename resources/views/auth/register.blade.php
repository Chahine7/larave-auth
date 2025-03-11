@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header  text-black text-center py-3 rounded-top-3">
                    <h4 class="mb-0">{{ __('Register') }}</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 position-relative">
                            <label for="name" class="form-label fw-semibold">{{ __('Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                <input id="name" type="text" class="form-control rounded-end @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                            </div>
                            @error('name')
                                <div class="text-danger mt-1 small"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-4 position-relative">
                            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control rounded-end @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required placeholder="Enter your email">
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

                        <div class="mb-4 position-relative">
                            <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                <input id="password-confirm" type="password" class="form-control rounded-end" 
                                       name="password_confirmation" required placeholder="Confirm your password">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn text-black btn-success px-4 py-2 rounded-pill fw-semibold">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection