@extends('layouts.auth.index')
@section('page_title')
    Masuk Ke Akun Saya
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card-group d-block d-md-flex row mx-2 ">
                <div class="card shadow rounded col-md-7 p-4 mb-3">
                    <div class="card-body">
                        <div class="auth-container">
                            <div class="auth-header">
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
                                @if (session()->has('success'))
                                    <div class="auth-header__notification">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="auth-header__notification">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="auth-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="d-block-lg w-100" action="{{ route('login') }}" method="post">
                                            @csrf
                                            <div class="input-group mb-3"><span class="input-group-text">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                                                        </use>
                                                    </svg></span>
                                                <input id="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" type="email"
                                                    placeholder="{{ __('Email Address') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-4"><span class="input-group-text">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}">
                                                        </use>
                                                    </svg></span>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="{{ __('Password') }}">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class=" mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Ingat Saya') }}
                                                    </label>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn rounded px-4 d-block-lg w-100 text-white mb-3"
                                                style="background-color: #101112;"> {{ __('Login') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
