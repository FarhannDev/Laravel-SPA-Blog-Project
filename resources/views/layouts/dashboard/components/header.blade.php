       <header class="header header-sticky mb-4">
           <div class="container-fluid">
               <button data-turbolinks="false" class="header-toggler px-md-0 me-md-3" type="button"
                   onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                   <svg class="icon icon-lg">
                       <use xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-menu') }}">
                       </use>
                   </svg>
               </button>

               <ul class="header-nav ms-auto">
                   @auth
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('author.stories.add') }}" data-turbolinks="false">
                               <span class="ms-2"><i class="fa fa-edit" style="font-size:22px"></i> Buat Postingan</span>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#" data-turbolinks="false">
                               <svg class="icon icon-xl">
                                   <use
                                       xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-bell') }}">
                                   </use>
                               </svg>
                           </a>
                       </li>
                   @endauth

               </ul>
               <ul class="header-nav ms-2" data-turbolinks="false">
                   <li class="nav-item dropdown">
                       @auth
                           <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                               <div class="avatar avatar-md"><img class="avatar-img"
                                       src="{{ \Auth::user()->avatar ? asset('http://ngeblogid.test/storage/avatar/' . \Auth::user()->avatar) : Gravatar::get('email@example.com', ['size' => 50]) }}">
                               </div>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end pt-0">
                               <a class="dropdown-item" href="{{ route('profile.index') }}">
                                   <svg class="icon me-2">
                                       <use
                                           xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                                       </use>
                                   </svg> Profile Saya</a>


                               <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                   <svg class="icon me-2">
                                       <use
                                           xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                                       </use>
                                   </svg> Logout
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                   </form>
                               </a>
                           </div>
                       @else
                           <div class="d-flex flex-wrap">
                               <a href="#" class="nav-link py-0 text-dark fw-normal" data-coreui-toggle="modal"
                                   data-coreui-target="#ngLoginModal">
                                   Login
                               </a>
                               <a href="#" data-coreui-toggle="modal" data-coreui-target="#ngRegisterModal"
                                   class="nav-link py-0 text-dark fw-normal">
                                   Register
                               </a>
                           </div>

                       @endauth

                   </li>

               </ul>
           </div>
           <div class="header-divider"></div>
           <div class="container-fluid" style="height: 20px;">
               @yield('breadcrumb')
           </div>
       </header>
