    <div class="sidebar sidebar-fixed" id="sidebar" style="background-color: #101112;">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('dist/dashboard/' . 'assets/brand/coreui.svg#full') }}"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('dist/dashboard/' . 'assets/brand/coreui.svg#signet') }}"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-title">APP MENU</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('homepage.index') }}" data-turbolinks="false">
                    <svg class="nav-icon">
                        <use
                            xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-home') }}">
                        </use>
                    </svg> Beranda</a></li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('stories.index') }}" data-turbolinks="false">
                    <svg class="nav-icon">
                        <use
                            xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-notes') }}">
                        </use>
                    </svg> Postingan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="# " data-turbolinks="false">
                    <svg class="nav-icon">
                        <use
                            xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                        </use>
                    </svg> Akun Saya
                </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use
                            xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-apps-settings') }}">
                        </use>
                    </svg> Pengaturan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <svg class="nav-icon">
                        <use
                            xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                        </use>
                    </svg> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
