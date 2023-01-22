<div>
    @section('page_title')
        {{ $page_title }}
    @endsection
    @section('breadcrumb')
        {{-- resources/views/home.blade.php --}}
        {{ Breadcrumbs::render('home') }}
    @endsection

    <div class="p-3 bg-white rounded">
        <header class="header">
            <h3 class="mx-3 mb-3">{{ __('Semua Postingan') }}</h3>
        </header>


        <div class="row align-content-start justify-content-arround pt-3">
            <div class="col-lg-8">
                <div class="d-block-lg w-100">

                    @foreach ($posts as $index => $post)
                        <div class="card rounded mb-3" id="story-{{ $post->id }}">
                            <a href="{{ route('story.detail', [$post->user['username'], $post->post_slug]) }}">
                                <img src="{{ $post->post_cover ? asset('storage/story/' . $post->post_cover) : asset('images/default.png') }}"
                                    class="img-fluid rounded w-100">
                            </a>
                            <div class="card-body">
                                <div class="row align-content-end justify-content-end">
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-light rounded-pill">{{ $post->category['category_name'] }}</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="row align-content-start">
                                    <div class="col-lg-10 col-md-10">
                                        <h3 class="text-dark"> <a
                                                href="{{ route('story.detail', [$post->user['username'], $post->post_slug]) }}"
                                                class="text-dark">{{ \Str::limit($post->post_title, 50) }}</a></h3>
                                    </div>
                                </div>
                                <div class="row align-content-start">
                                    <div class="col-lg-10 col-md-10">
                                        {!! \Str::limit(strip_tags($post->post_description), '200') !!}
                                    </div>
                                </div>
                                <div class="row align-content-start py-3">
                                    <div class="col-lg-10 col-md-10">
                                        <div class="d-block-lg w-100">
                                            <div class="d-flex justify-content-start">
                                                <div class="col-1">
                                                    <span class="d-inline">
                                                        <a href="" class="text-dark text-decoration-none">
                                                            <img src=" {{ $post->user->avatar ? asset('storage/avatar/' . $post->user->avatar) : Gravatar::get('email@example.com') }}"
                                                                class="img-fluid rounded-circle" width="40">

                                                        </a>
                                                    </span>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="d-flex flex-column">
                                                        <span class="d-inline">
                                                            <a href="{{ route('author.profile.public', $post->user->username) }}"
                                                                class="text-dark text-decoration-none">
                                                                {{ $post->publish_by }}
                                                            </a>
                                                        </span>
                                                        <span class="d-inline text-capitalize">
                                                            {{ date('d M Y', strtotime($post->publish_date)) }}
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-block-lg w-100 rounded border mb-3">
                    <h3 class="px-3 ">Kategori</h3>
                    <hr>
                    <ul class="list-group list-group-flush">
                        @foreach ($category_posts as $index => $category)
                            <li class="list-group-item"><a href=""
                                    class="text-dark text-decoration-none">{{ $category->category_name }}
                                    (0)
                                </a></li>
                        @endforeach
                    </ul>
                    <div class="text-center mb-3 mt-3">
                        <a href="" class="text-dark text-decoration-none ">Lihat Semua Kategori</a>
                    </div>
                </div>
                <div class="d-block-lg w-100 border rounded">
                    <h3 class="px-3 ">Rekomendasi Postingan </h3>
                    <hr>
                    <ul class="list-group list-group-flush">
                        @foreach ($latest as $index => $late)
                            <li class="list-group-item"><a
                                    href="{{ route('story.detail', [$late->user['username'], $late->post_slug]) }}"
                                    class="text-dark text-decoration-none">{{ \Str::limit($late->post_title, 50) }}
                                </a></li>
                        @endforeach
                    </ul>
                    <div class="text-center mb-3 mt-3">
                        <a href="" class="text-dark text-decoration-none ">Lihat Semua Rekomendasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
