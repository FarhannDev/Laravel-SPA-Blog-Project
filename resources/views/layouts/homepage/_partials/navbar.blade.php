        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="m-0">NGEBLOGID</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                    <small>MENU</small>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ route('beranda.index') }}" class="nav-item nav-link ">Beranda</a>
                        <a href="{{ route('blog.index') }}" class="nav-item nav-link">Blog</a>
                        {{-- <a href="about.html" class="nav-item nav-link">Vlog</a> --}}
                        <a href="about.html" class="nav-item nav-link">Testimonial</a>
                        <a href="about.html" class="nav-item nav-link">Tentang Kami</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div> --}}
                        <a href="contact.html" class="nav-item nav-link">Pusat Bantuan</a>
                    </div>

                    @auth
                        <a href="{{ route('stories.index') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block"><i
                                class="fas fa-home"></i> Dashboard</a>
                    @else
                        <a href="{{ route('register') }}"
                            class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Bergabung Sekarang</a>
                    @endauth
                </div>
            </nav>

            @yield('hero-header')
        </div>
        <!-- Navbar & Hero End -->
