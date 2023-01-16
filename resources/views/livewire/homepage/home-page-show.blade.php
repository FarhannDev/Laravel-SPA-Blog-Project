<style>
    p {
        font-size: 22px;
    }
</style>
<div>
    @section('page_title')
        {{ $stories_title }}
    @endsection
    <div class="card shadow rounded bg-white mb-3">
        <div class="card-body">
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
                    <div class="post-header mb-5">
                        <div class="post-header__title">
                            <h2 class="fw-bold text-capitalize ms-2">{{ $stories_title }}</h2>
                        </div>
                    </div>

                    <div class="post-image__cover mb-3">
                        <div class="ms-auto d-flex px-2 ">
                            <img src="{{ asset('/storage/posts/' . $stories_image) }}" class="rounded img-fluid w-100">
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
