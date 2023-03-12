<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">

<head>

    <base href="{{ url('/') }}">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="@yield('author')">
    <meta name="keyword" content="@yield('keyword')">
    <title> NgeBlogID - @yield('page_title')</title>
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('dist/dashboard/' . 'assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('dist/dashboard/' . 'assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="{{ asset('dist/dashboard/' . 'assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('dist/dashboard/' . 'vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/dashboard/' . 'css/vendors/simplebar.css') }}">
    <link href="{{ asset('dist/dashboard/' . 'css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('dist/dashboard/' . 'css/examples.css') }}" rel="stylesheet">
    <!-- include libraries(jQuery, bootstrap) -->
    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- include font awesome css/js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"
        integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    @livewireStyles
    @livewireScripts

    <!-- Scripts -->
    <script src="{{ asset('build/assets/app-19b098c9.js') }}" defer></script>
    {{-- @vite(['resources/js/app.js']) --}}
</head>

<body>


    @include('layouts.dashboard.components.sidebar')

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.dashboard.components.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                @yield('content')
            </div>
        </div>
        @include('layouts.dashboard.components.footer')
    </div>

    <script src="{{ asset('dist/dashboard/' . 'vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/dashboard/' . 'vendors/simplebar/js/simplebar.min.js') }}"></script>

    @stack('javascript')

    @guest
        <!-- Modal:Login -->
        <div class="modal fade" id="ngLoginModal" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1"
            aria-labelledby="ngLoginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ngLoginModalLabel">NGEBLOGID - LOGIN</h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-content-start mb-3">
                            <div class="col">
                                <h2>Login</h2>
                            </div>
                        </div>
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
                        <div class="row align-content-start">
                            <div class="col-md-12">
                                <form class="d-block-lg w-100" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3"><span class="input-group-text">
                                            <svg class="icon">
                                                <use
                                                    xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                                                </use>
                                            </svg></span>
                                        <input id="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            type="email" placeholder="{{ __('Email Address') }}">
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
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }} checked>

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
        <!-- Modal:Register -->
        <div class="modal fade" id="ngRegisterModal" data-coreui-backdrop="static" data-coreui-keyboard="false"
            tabindex="-1" aria-labelledby="ngRegisterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ngRegisterModalLabel">NGEBLOGID - REGISTER</h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-content-start mb-3">
                            <div class="col">
                                <h2>Register</h2>
                            </div>
                        </div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('register') }}" class="p-2">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <label for="name" class="form-label">{{ __('Nama Anda') }}</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" required autocomplete="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="username" class="form-label">{{ __('Username') }}</label>
                                            <input type="text" name="username"
                                                class="form-control  @error('username') is-invalid @enderror"
                                                id="username" value="{{ old('username') }}" required
                                                autocomplete="username" maxlength="14">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="email" class="form-label">Alamat Email</label>
                                            <input type="email"
                                                class="form-control  @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password"
                                                class="form-control  @error('password') is-invalid @enderror"
                                                id="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="password_confirmation" class="form-label">Konfirmasi</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <button type="submit" class="btn btn-dark rounded-pill d-block-lg w-100">Daftar
                                            Sekarang</button>
                                        <br>
                                        <div class="text-center pt-2">
                                            <span class="d-inline text-dark">Atau</span>
                                            <span class="d-block text-dark">
                                                <a href="" class="btn btn-link text-dark text-decoration-none"><img
                                                        src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png"
                                                        width="50" alt="">Daftar Dengan Akun Google</a>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest



</body>

</html>
