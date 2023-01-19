    @section('page_title')
        NgeBlogID
    @endsection
    @section('breadcrumb')
        {{-- resources/views/home.blade.php --}}
        {{ Breadcrumbs::render('profile', $user->username) }}
    @endsection

    <div>
        <div class="p-2">
            <div class="d-block-lg w-100 mb-3  py-2">
                <header class="header">
                    <h2 class="mx-3">{{ $user->name }}</h2>
                </header>

                <div class=" bg-white border-bottom">
                    <div class="p-3">
                        <ul class="nav nav-underline">
                            <li class="nav-item">
                                <a class="nav-link text-dark   " href="">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark "
                                    href="{{ route('author.profile.about', \Auth::user()->username) }}">About
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="list-group list-group-flush mb-3">
                    @foreach ($data as $index => $value)
                        <li class="list-group-item">

                            <div class="row justify-content-between align-content-arround">
                                <div class="col-lg-8 col-sm-9 col-xs-9">
                                    <div class="posts px-md-3">
                                        <div class="post-title mb-2">
                                            <div class="d-flex flex-wrap mb-2">
                                                <a href="#"
                                                    class="btn btn-link m-0 p-0 text-decoration-none text-dark">
                                                    <div class="author-info">
                                                        <span class="author-info__name  text-capitalize ">
                                                            {{ date('M d, Y', strtotime($value->publish_date)) }}</span>
                                                    </div>
                                                </a>

                                            </div>
                                            <h4 class="card-title"><a
                                                    href="{{ route('author.stories.show', $value->post_slug) }}"
                                                    class="text-dark fw-bolder ">
                                                    {{ \Str::ucfirst($value->post_title) }}</a></h4>
                                        </div>
                                        <div class="post-body mb-3">
                                            {!! \Str::limit($value->post_description, 200, '...') !!}
                                        </div>
                                        <div class="d-flex justify-content-arround align-items-center py-3 mb-3">
                                            <a href=""
                                                class="btn btn-light btn-sm rounded-pill">{{ $value->category['category_name'] }}</a>
                                            <span class="ms-2">2 Min Read</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3">
                                    <img src="{{ asset('storage/posts/' . $value->post_cover) }}"
                                        class="img-fluid rounded w-100">
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
