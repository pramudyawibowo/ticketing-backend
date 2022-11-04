@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url("{{ asset('assets/media/auth/bg10.jpeg') }}");
            }

            [data-theme="dark"] body {
                background-image: url("{{ asset('assets/media/auth/bg10-dark.jpeg') }}");
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column-fluid justify-content-center p-20 m-auto">
                <div class="bg-body d-flex flex-center rounded-4 w-600px h-400px p-20">
                    <div class="w-450px">
                        <form class="form w-250" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('home') }}" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email" name="email" autocomplete="email" autofocus class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" class="form-control bg-transparent @error('password') is-invalid @enderror" autocomplete="current-password" required />
                            </div>
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="{{ route('password.request') }}" class="link-primary">Forgot Password ?</a>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">Sign In</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                                <a href="{{ route('register') }}" class="link-primary">Sign up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
