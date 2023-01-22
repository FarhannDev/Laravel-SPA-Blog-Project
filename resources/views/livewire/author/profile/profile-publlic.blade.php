    @section('page_title')
        {{-- {{ $page_title }} --}}
    @endsection
    @section('breadcrumb')
        {{-- resources/views/home.blade.php --}}
        {{-- {{ Breadcrumbs::render('profile', $user->username) }} --}}
    @endsection

    <div>
        <div class="p-2 bg-white rounded">
            <div class="d-block-lg w-100 mb-3  py-2">
                <header class="header">
                    <h3 class="mx-3">{{ $user->name }}</h3>
                </header>

                <div class="row justify-content-center align-content-center">
                    <div class="col-md-12">
                        <div class="text-center py-3">
                            <img src="{{ $user->avatar ? asset('storage/avatar/' . $user->avatar) : Gravatar::get('email@example.com') }}"
                                width="250" class="img-fluid rounded-pill">
                            <figcaption class="figure-caption text-center pt-2">{{ $user->name }}</figcaption>
                        </div>
                    </div>
                </div>

                <div class=" bg-white border-bottom">
                    <div class="p-3">
                        <ul class="nav nav-underline">
                            <li class="nav-item">
                                <a class="nav-link text-dark {{ Route::is('author.profile.public') ? 'text-decoration-underline' : '' }} "
                                    href="{{ route('author.profile.public', $user->username) }}">Tentang Saya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark "
                                    href="{{ route('author.public.story', $user->username) }}">Semua Cerita </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row align-content-start">
                    <div class="col-md-12">
                        <div class="d-block-lg w-100 px-3 mx-3 py-3">
                            -
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
