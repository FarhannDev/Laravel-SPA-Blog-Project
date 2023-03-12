<div>
    @section('page_title')
        {{ $stories_title }}
    @endsection

    @section('description')
        {{ \Str::limit(htmlspecialchars($stories_description), 250, '') }}
    @endsection

    @section('author')
        {{ $stories_publish_by }}
    @endsection
    @section('keyword')
        {{ $stories_title }}
    @endsection

    <div class="row ">
        <div class="col-md-12">
            <div class="card bg-white" style="border-radius: 8px;" id="story-{{ $stories_id }}">
                <div class="row">
                    <div class="col">
                        <a href="{{ url('/beranda') }}" class="btn btn-link text-dark text-decoration-none p-2 mx-2"><i
                                class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-content-start">
                        <div class="col-lg-8">
                            <div class="row align-content-start mb-3">
                                <div class="col-lg-10 col-md-10">
                                    <div class="d-block-lg w-100">
                                        <div class="d-flex justify-content-start">
                                            <div class="col-1">
                                                <span class="d-inline">
                                                    <a href="" class="text-dark text-decoration-none">
                                                        <img src=" {{ $avatar ? asset('storage/avatar/' . $avatar) : Gravatar::get('email@example.com') }}"
                                                            class="img-fluid rounded-circle" width="40">

                                                    </a>
                                                </span>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="d-flex flex-column">
                                                    <span class="d-inline">
                                                        <a href="" class="text-dark text-decoration-none">
                                                            {{ $stories_publish_by }}
                                                        </a>
                                                    </span>
                                                    <span class="d-inline text-capitalize">
                                                        {{ date('d M Y', strtotime($stories_publish)) }}
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row align-content-start">
                                <div class="col">
                                    <img src="{{ $stories_image ? asset('storage/story/' . $stories_image) : asset('images/default.png') }}"
                                        class="img-fluid w-100 rounded" alt="{{ $stories_title }}">
                                </div>
                            </div>
                            <div class="row align-content-start">
                                <div class="col-lg-10 col-md-10 ">
                                    <h2 class="text-dark">{{ $stories_title }}</h2>
                                </div>
                            </div>
                            <div class="row align-content-start">
                                <div class="col ">
                                    {!! $stories_description !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-block-lg w-100 border">
                                <h3 class="px-3 ">Rekomendasi Postingan</h3>
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
                                    <a href="" class="text-dark text-decoration-none ">Lihat semua
                                        rekomendasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
