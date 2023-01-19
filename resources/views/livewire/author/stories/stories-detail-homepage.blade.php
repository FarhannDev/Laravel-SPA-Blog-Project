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
            <div class="card bg-white" style="border-radius: 8px;">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('homepage.index') }}"
                            class="btn btn-link text-dark text-decoration-none p-2 mx-2"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                </div>
                <div class="row justify-content-center align-content-end">
                    <div class="col-lg-10">
                        <div class="row flex-column g-3 p-3">
                            <div class="col">
                                <div class="d-flex flex-wrap mb-3">
                                    <a href="#" class="btn btn-link m-0 p-0 text-decoration-none text-dark">
                                        <div class="author-info">
                                            <span><img src="{{ asset('storage/avatar/author-63c156869b047.jpg') }}"
                                                    class="img-fluid rounded-circle" width="50">
                                            </span>
                                            <span class="author-info__name ms-2 text-capitalize ">
                                                {{ $stories_publish_by }}
                                                {{ $stories_publish }}
                                            </span>
                                        </div>

                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3 class="text-dark fw-bolder px-2 mb-3"> {{ $stories_title }}</h3>
                                    </div>
                                </div>
                                <div class="d-flex px-2 mb-3">
                                    <img src="{{ $stories_image }}" class="rounded img-fluid w-100 " height="250">
                                </div>

                                <div class="d-block-lg w-100 px-2">
                                    {!! $stories_description !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
