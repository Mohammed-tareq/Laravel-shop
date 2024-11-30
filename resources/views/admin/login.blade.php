@extends('layouts.adminlog')

@section('content')

<form method="POST" action="{{ route('makeadminlogin') }}">
                        @csrf

                        <div class=" mb-3">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class=" mb-3">
                            <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>



                        <div class="mb-3 ">
                                <button type="submit" class="btn btn-primary  w-100 py-8 mb-4 rounded-2">
                                    {{ __('Login') }}
                                </button>

                                <div class="d-inline-block">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                </div>
                        </div>



                        <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-medium">New to Admins?</p>
                            <a class="text-primary fw-medium ms-2" href="{{ route('adminregister') }}">Create an
                            account</a>
                        </div>
</form>
@endsection
