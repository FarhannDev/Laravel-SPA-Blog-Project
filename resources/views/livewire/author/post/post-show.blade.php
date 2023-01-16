<div>
    @section('page_title')
        {{ $title }}
    @endsection
    <div class="card shadow rounded bg-white mb-3">
        <div class="card-header">
            <a href="{{ route('author.posts.index') }}" class="text-dark text-decoration-none"><i
                    class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="d-block-lg w-100 bg-white mx-md-3">
                <div class="post-container">
                    <div class="post-image__cover mb-3">
                        <div class="ms-auto d-flex justify-content-center">
                            <img src="{{ asset('/storage/posts/' . $cover) }}" class="rounded img-fluid">
                        </div>

                    </div>
                    <div class="post-body px-3">
                        <div class="post-body__title">
                            <h3>{{ $title }}</h3>
                        </div>
                        <div class="post-body__intro mb-3">
                            <div class="d-flex justify-content-arround">
                                <span class="text-dark"><i class="fas fa-user"></i> {{ $publish_by }}</span>
                                <span class="text-dark ms-3"><i class="fas fa-clock"></i>{{ $created }}</span>
                            </div>
                        </div>
                        <div class="post-body__desc ">
                            {!! $description !!}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
