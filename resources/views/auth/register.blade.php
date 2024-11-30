@extends('layouts.userlog')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
            <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>

    <div class=" mb-3">
            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>

        <div class=" mb-3">
            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class=" mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label d-inline">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="mb-3">
                <button type="submit" class="btn btn-primary  w-100 py-8 mb-4 rounded-2">
                    {{ __('Register') }}
                </button>
        </div>


        <div class="d-flex align-items-center">
            <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
            <a class="text-primary fw-medium ms-2" href="{{ route('login') }}">Sign In</a>
        </div>
</form>


@endsection
