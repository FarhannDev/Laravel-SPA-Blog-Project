<div>
    @section('page_title')
        {{ $stories_title }}
    @endsection
    @section('breadcrumb')
        {{-- resources/views/home.blade.php --}}
        {{ Breadcrumbs::render('story-show', $posts) }}
        {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>Blank</span></li>
        </ol>
    </nav> --}}
    @endsection

    <div class="card shadow rounded bg-white mb-3">
        <div class="card-header"> <a href="{{ route('author.stories.index') }}"
                class="btn btn-link text-dark text-decoration-none p-2 mx-2"><i class="fas fa-arrow-left"></i>
                Back</a></div>
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-lg-8">
                    <div class="d-block-lg w-100 bg-white mx-md-3 pt-2">
                        <div class="post-container">
                            <div class="d-flex flex-wrap mb-3">
                                <a href="#" class="btn btn-link m-0 p-0 text-decoration-none text-dark">
                                    <div class="author-info">
                                        <span><img src="{{ asset('storage/avatar/author-63c156869b047.jpg') }}"
                                                class="img-fluid rounded-circle" width="50">
                                        </span>
                                        <span class="author-info__name ms-2 text-capitalize ">
                                            {{ $stories_publish }}
                                            {{ $stories_publish_date }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="post-header">
                                <div class="post-header__title">
                                    <h2 class="fw-bold text-capitalize ms-2">{{ $stories_title }}</h2>
                                </div>
                            </div>
                            <div class="post-image__cover mb-3 pt-3">
                                <div class="ms-auto d-flex px-2 ">
                                    <img src="{{ $stories_image ? asset('storage/story/' . $stories_image) : asset('images/default.png') }}"
                                        class="rounded img-fluid w-100 ">
                                </div>

                            </div>
                            <div class="post-body ">
                                <div class="post-body__desc p-2 ">
                                    {!! $stories_content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
