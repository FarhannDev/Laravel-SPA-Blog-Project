<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="turbolinks-cache-control" content="no-cache">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('dist/digital/' . 'img/favicon.ico') }}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('dist/digital/' . 'lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/digital/' . 'lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/digital/' . 'lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/digital/' . 'css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/digital/' . 'css/style.css') }}" rel="stylesheet">

    @livewireStyles
    @livewireScripts

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container-xxl bg-white p-0">
        @include('layouts.homepage._partials.spinner')
        @include('layouts.homepage._partials.navbar')

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By a <a class="border-bottom" href="https://themewagon.com"
                                target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dist/digital/' . 'lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('dist/digital/' . 'lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('dist/digital/' . 'lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('dist/digital/' . 'lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('dist/digital/' . 'lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dist/digital/' . 'lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('dist/digital/' . 'lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('dist/digital/' . 'js/main.js') }}"></script>

    @stack('javascript')
</body>

</html>
