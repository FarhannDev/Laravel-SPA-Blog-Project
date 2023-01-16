<div>
    @section('page_title')
        NgeBlogID
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
                            <a class="nav-link text-dark " href="{{ route('profile.index', $user->username) }}">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark {{ Route::is('profile.about') ? 'text-decoration-underline' : '' }} "
                                href="{{ route('profile.about', $user->username) }}">About </a>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="row pt-3 mb-3">
                    <div class="col-lg-4 col-md-6">
                        <img src="{{ asset('storage/avatar/' . 'author-63c156869b047.jpg') }}" width="250"
                            class="img-fluid rounded-pill mb-3" alt="">
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $name }}</li>
                            <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                                tempora quibusdam debitis quam veniam porro recusandae ex. Praesentium natus quod,
                                distinctio rem inventore architecto illo, unde ullam, iste cum voluptate.</li>

                            @auth
                                <li class="list-group-item">
                                    <a href="{{ route('settings.index') }}"
                                        class="btn btn-link text-dark text-decoration-none m-0 p-0">Edit
                                        Profile</a>
                                </li>
                            @endauth

                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
