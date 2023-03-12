 @extends('layouts.auth.index')

 @section('content')
     <div class="row justify-content-center">
         <div class="col-lg-6">
             <div class="card-group d-block d-md-flex py-3">
                 <div class="card rounded col-md-7 mb-3"
                     style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px; border-radius: 8px;">
                     <div class="card-header bg-white">
                         <a href="{{ route('homepage.index') }}" class="btn btn-link text-dark text-decoration-none"><i
                                 class="fas fa-arrow-left"></i>
                             Kembali</a>
                         {{-- <h1>Register</h1> --}}
                     </div>
                     <div class="card-body mb-3">
                         <h3 class="px-2">Daftar Akun</h3>
                         <div class="row justify-content-center">
                             <div class="col-lg">
                                 <div class="row">
                                     <div class="col-md-12">
                                         <form method="POST" action="{{ route('register') }}" class="p-2">
                                             @csrf
                                             <div class="row g-3">
                                                 <div class="col-sm-6">
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
                                                 <div class="col-sm-6">
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
                                                         class="form-control  @error('email') is-invalid @enderror"
                                                         id="email" name="email" value="{{ old('email') }}" required
                                                         autocomplete="email">
                                                     @error('email')
                                                         <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                         </span>
                                                     @enderror
                                                 </div>
                                                 <div class="col-sm-6">
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
                                                 <div class="col-sm-6">
                                                     <label for="password_confirmation"
                                                         class="form-label">Konfirmasi</label>
                                                     <input type="password" name="password_confirmation"
                                                         class="form-control" id="password_confirmation">
                                                 </div>
                                             </div>
                                             <div class="pt-3">
                                                 <button type="submit"
                                                     class="btn btn-dark rounded-pill d-block-lg w-100">Daftar
                                                     Sekarang</button>
                                                 <br>
                                                 <div class="text-center pt-2">
                                                     <span class="d-inline text-dark">Atau</span>
                                                     <span class="d-block text-dark">
                                                         <a href=""
                                                             class="btn btn-link text-dark text-decoration-none"><img
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
             </div>
         </div>
     </div>
 @endsection

 @prepend('javascript')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/js/all.min.js"
         integrity="sha512-/Hn7mYbBR5AzOJSNR6p80QQDXFIPFKTLMak6/LyKqyCuFQU3zHqZphy8kNKwWS4BA1sDbuZ0VN/IEn3xvinJVw=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 @endprepend
