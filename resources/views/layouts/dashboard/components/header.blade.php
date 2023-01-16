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
                           <a class="nav-link" href="{{ route('stories.add') }}" data-turbolinks="false">
                               <span class="ms-2"><i class="fa fa-edit" style="font-size:22px"></i> Buat Postingan</span>
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
                                       src="{{ \Auth::user()->avatar ? asset('storage/avatar/' . \Auth::user()->avatar) : asset('dist/dashboard/assets/img/avatars/9.jpg') }}">
                               </div>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end pt-0">
                               <a class="dropdown-item" href="{{ route('profile.index', Auth::user()->username) }}">
                                   <svg class="icon me-2">
                                       <use
                                           xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                                       </use>
                                   </svg> Profil Saya</a>


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
                               <a data-coreui-toggle="modal" data-coreui-target="#modalLogin"
                                   class="nav-link py-0 text-dark fw-normal" href="#">
                                   Login
                               </a>
                               <a data-coreui-toggle="modal" data-coreui-target="#modalRegister" href="#"
                                   class="nav-link py-0 text-dark fw-normal">
                                   Register
                               </a>
                           </div>

                       @endauth

                   </li>

               </ul>
           </div>
           <div class="header-divider"></div>
           <div class="container-fluid">
               <nav aria-label="breadcrumb">
                   <ol class="breadcrumb my-0 ms-2">
                       <li class="breadcrumb-item">
                           <!-- if breadcrumb is single--><span>Home</span>
                       </li>
                       <li class="breadcrumb-item active"><span>Blank</span></li>
                   </ol>
               </nav>
           </div>
       </header>
       <!-- Modal Login -->
       <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="modalLoginLabel">NgeBlogID - Login</h5>
                       <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="row justify-content-center">
                           <div class="col-lg">
                               <div class="auth-container p-2">
                                   <div class="auth-header">
                                       <h1>Login</h1>
                                       <p class="text-medium-emphasis">Sign In to your account</p>
                                   </div>
                                   <div class="auth-body">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <form class="d-block-lg w-100" action="{{ route('login') }}"
                                                   method="post">
                                                   @csrf
                                                   <div class="input-group mb-3"><span class="input-group-text">
                                                           <svg class="icon">
                                                               <use
                                                                   xlink:href="{{ asset('dist/dashboard/' . 'vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                                                               </use>
                                                           </svg></span>
                                                       <input id="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email" type="email"
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

                                                   <div class=" mb-3" hidden>
                                                       <div class="form-check">
                                                           <input class="form-check-input" type="checkbox"
                                                               name="remember" id="remember"
                                                               {{ old('remember') ? 'checked' : '' }} checked>

                                                           <label class="form-check-label" for="remember">
                                                               {{ __('Simpan Sesi Login Saya Untuk Berikutnya.') }}
                                                           </label>
                                                       </div>

                                                   </div>

                                                   <button type="submit"
                                                       class="btn rounded btn-md px-4 d-block-lg w-100 text-white mb-3"
                                                       style="background-color: #101112;">
                                                       {{ __('Login') }}</button>
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
       </div>
       <!-- Modal Register-->
       <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel"
           aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="modalRegisterLabel">NgeBlogID - Register</h5>
                       <button type="button" class="btn-close" data-coreui-dismiss="modal"
                           aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="row justify-content-center">
                           <div class="col-lg">
                               <div class="auth-container p-2">
                                   <div class="auth-header">
                                       <h1>Register</h1>
                                       <p class="text-medium-emphasis">Register In your account</p>
                                   </div>
                                   <div class="auth-body">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <form method="POST" action="{{ route('register') }}">
                                                   @csrf
                                                   <div class="mb-3">
                                                       <label for="name"
                                                           class="form-label">{{ __('Name') }}</label>
                                                       <input id="name" name="name" type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           value="{{ old('name') }}" required autocomplete="name">
                                                       @error('name')
                                                           <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $message }}</strong>
                                                           </span>
                                                       @enderror
                                                   </div>
                                                   <div class="mb-3">
                                                       <label for="username"
                                                           class="form-label">{{ __('Username') }}</label>
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
                                                   <div class="mb-3">
                                                       <label for="email" class="form-label">Email
                                                           address</label>
                                                       <input type="email"
                                                           class="form-control  @error('email') is-invalid @enderror"
                                                           id="email" name="email" value="{{ old('email') }}"
                                                           required autocomplete="email">
                                                       @error('email')
                                                           <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $message }}</strong>
                                                           </span>
                                                       @enderror
                                                   </div>
                                                   <div class="mb-3">
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
                                                   <div class="mb-3">
                                                       <label for="password_confirmation" class="form-label">Password
                                                           Confirm</label>
                                                       <input type="password" name="password_confirmation"
                                                           class="form-control" id="password_confirmation">
                                                   </div>
                                                   <button type="submit"
                                                       class="btn btn-dark rounded d-block-lg w-100">Register</button>
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
       </div>
