    <div class="sidebar sidebar-fixed" id="sidebar" style="background-color: #101112;" data-turbolinks="false">
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

            @role('admin')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-chart-line') }}">
                            </use>
                        </svg> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('homepage.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-home') }}">
                            </use>
                        </svg> Beranda</a></li>
                <li class="nav-item"><a data-turbolinks="false"class="nav-link" href="{{ route('story.search') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-search') }}">
                            </use>
                        </svg> Cari</a></li>
                <li class="nav-title">Stories Menu Management</li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.stories.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-notes') }}">
                            </use>
                        </svg> Stories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-notes') }}">
                            </use>
                        </svg>Categories</a></li>
                <li class="nav-title">User Menu Management</li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.permission.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                            </use>
                        </svg> Permission</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.role.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                            </use>
                        </svg> Roles</a></li>

                <hr>
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
            @endrole

            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('homepage.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-home') }}">
                            </use>
                        </svg> Home</a></li>
                <li class="nav-item"><a data-turbolinks="false"class="nav-link" href="{{ route('story.search') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-search') }}">
                            </use>
                        </svg> Search</a></li>
            @endguest

            @role('author')
                <li class="nav-item"><a class="nav-link" href="{{ route('homepage.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-home') }}">
                            </use>
                        </svg> Beranda</a></li>
                <li class="nav-item"><a data-turbolinks="false"class="nav-link" href="{{ route('story.search') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-search') }}">
                            </use>
                        </svg> Cari</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('author.stories.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-notes') }}">
                            </use>
                        </svg> Postingan</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('profile.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                            </use>
                        </svg> Profile Saya
                    </a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('setting.index') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-apps') }}">
                            </use>
                        </svg> Pengaturan
                    </a>
                </li>
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
            @endrole




        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
