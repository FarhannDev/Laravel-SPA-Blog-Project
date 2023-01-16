@section('page_title')
    Dashboard
@endsection

<div>
    <div class="card shadow rounded bg-white">
        <div class="card-header">
            <div class="text-dark text-capitalize fw-bolder">Dashboard</div>
        </div>
        <div class="card-body mb-3">
            <div class="dashboard-container">
                <div class="dashboard-inner__header border-bottom mb-3">
                    <h5 class="text-capitalize fw-normal">Selamat Datang Kembali,{{ \Auth::user()->name }}.</h5>
                </div>
                <div class="dashboard-inner__content">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <div class="card mb-4">
                                <div
                                    class="card-header bg-dark text-white position-relative d-flex justify-content-center align-items-center">
                                    Postingan
                                </div>
                                <div class="card-body row text-center">
                                    <div class="col">
                                        <div class="fs-5 fw-semibold">{{ $total_posts }}</div>
                                        <div class="text-uppercase text-medium-emphasis small">Total Semua Postingan
                                        </div>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="col">
                                        <div class="fs-5 fw-semibold">{{ $total_post_unpublish }}</div>
                                        <div class="text-uppercase text-medium-emphasis small">Postingan Tersimpan</div>
                                    </div>
                                    <div class="col">
                                        <div class="fs-5 fw-semibold">{{ $total_post_publish }}</div>
                                        <div class="text-uppercase text-medium-emphasis small">Postingan Publish</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="card mb-4">
                                <div
                                    class="card-header bg-dark text-white position-relative d-flex justify-content-center align-items-center">
                                    Postingan Terbaru
                                </div>
                                <div class="card-body ">
                                    <div class="d-block-lg w-100 bg-white">
                                        <ul class="list-group list-group-flush">
                                            @forelse ($posts as $index => $post)
                                                <li class="list-group-item">
                                                    {{ \Str::limit($post->post_title, 50, '...') }}</li>
                                            @empty
                                                <li class="list-group-item text-center">Postingan Tidak Tersedia.</li>
                                            @endforelse

                                        </ul>
                                        <hr />
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="{{ route('author.posts.index') }}"
                                                class="text-dark text-decoration-none">
                                                Lihat Semua Postingan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
