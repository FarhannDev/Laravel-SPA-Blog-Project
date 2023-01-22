<div>
    @section('page_title')
        NgeBlogID
    @endsection
    @section('breadcrumb')
        {{-- resources/views/home.blade.php --}}
        {{ Breadcrumbs::render('profile-about', $username) }}
    @endsection


    <div class="p-2 mb-3">
        <div class="d-block-lg w-100 mb-3  py-2">
            <header class="header">
                <h2 class="mx-3">{{ $name }}</h2>
            </header>

            <div class=" bg-white border-bottom">
                <div class="p-3">
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link text-dark " href="{{ route('author.profile.index') }}">All Story </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ Route::is('author.profile.about') ? 'text-decoration-underline' : '' }} "
                                href="javascript:void(0)">About </a>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="row pt-3 mb-3">
                    <div class="col-lg-4 col-md-6">
                        <img src="{{ \Auth::user()->avatar ? asset('http://ngeblogid.test/storage/avatar/' . \Auth::user()->avatar) : Gravatar::get('email@example.com', ['size' => 50]) }}"
                            width="250" class="img-fluid rounded mb-3 mx-3" alt="">
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="mb-3 row px-3">
                            <label for="staticEmail" class="col-sm-3 col-form-label"> Name :</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $name }}">
                            </div>
                        </div>
                        <div class="mb-3 row px-3">
                            <label for="staticEmail" class="col-sm-3 col-form-label"> Username :</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $username }}">
                            </div>
                        </div>
                        <div class="mb-3 row px-3">
                            <label for="staticEmail" class="col-sm-3 col-form-label"> Email :</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $email }}">
                            </div>
                        </div>
                        <div class="mb-3 row px-3">
                            <label for="staticEmail" class="col-sm-3 col-form-label"> Join Date :</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $joinDate }}">
                            </div>
                        </div>
                        <div class="mb-3 row px-3">
                            <label for="staticEmail" class="col-sm-3 col-form-label"> Bio :</label>
                            <div class="col-sm-9">
                                <span class="text-dark fw-normal">-</span>
                            </div>
                        </div>
                        <div class="mb-3  px-3">
                            <a data-turbolinks="false" href="{{ route('author.profile.edit', $username) }}"
                                class=" text-dark">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
