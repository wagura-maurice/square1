@extends('layouts.auth')

@section('content')

<h1 class="auth-title">{!! __('Reset Password') !!}</h1>
<p class="auth-subtitle mb-5">reset your account credentials.</p>

<form method="POST" action="{!! route('password.update') !!}">
    @csrf
    <input type="hidden" name="token" value="{!! $token !!}">
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{!! $email ?? old('email') !!}" placeholder="{!! __('E-Mail Address') !!}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" placeholder="{!! __('Password') !!}" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="password-confirm" type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="{!! __('Confirm Password') !!}" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{!! __('Reset Password') !!}</button>
</form>
@endsection
