<div>
    @section('page_title')
        NgeBlogID
    @endsection

    <div class="p-2">

        <div class="d-block-lg w-100 mb-3  py-2 bg-white">
            <header class="header">
                <h4 class="mx-3">Semua Daftar Postingan</h4>
            </header>
            @if (session()->has('success'))
                <div class="auth-header__notification">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="row justify-content-end py-3 px-3 mb-3">
                <div class="col-lg-4">
                    <div class=" mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cari Postingan</label>
                        <input wire:model.debounce.500ms='search' type="text" class="form-control"
                            placeholder="Cari postingan" aria-label="Cari postingan" aria-describedby="button-addon2">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class=" mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cari Berdasarkan Kategori</label>
                        <select wire:model.debounce.300ms="category" wire:ignore.self class="form-select"
                            aria-label="Default select example">
                            <option selected value="">Pilih Semua Kategori</option>
                            @foreach ($category_posts as $cat)
                                <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class=" mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cari Berdasarkan Tanggal</label>
                        <input wire:model="publish" type="date" class="form-control" placeholder="Cari postingan"
                            aria-label="Cari postingan" aria-describedby="button-addon2">
                    </div>
                </div>

            </div>

            <ul class="list-group list-group-flush mb-3">
                @foreach ($posts as $index => $post)
                    <li class="list-group-item">

                        <div class="row justify-content-between align-content-around ">
                            <div class="col-lg-8 col-sm-9 col-xs-9">
                                <div class="posts px-md-2">
                                    <div class="post-title mb-2">
                                        <div class="d-flex flex-wrap">
                                            <a href="#"
                                                class="btn btn-link m-0 p-0 text-decoration-none text-dark">
                                                <div class="author-info">
                                                    <span><img
                                                            src="{{ asset('storage/avatar/' . $post->user['avatar']) }}"
                                                            class="img-fluid rounded-circle" width="30">
                                                    </span>
                                                    <span class="author-info__name ms-2 text-capitalize ">
                                                        {{ $post->publish_by }}
                                                        <span class="fw-bolder">
                                                            {{ \Carbon\Carbon::parse($post->publish_date)->diffForHumans() }}</span>
                                                    </span>

                                                </div>
                                            </a>

                                        </div>
                                        <h4 class="card-title mx-2 pt-3"><a
                                                href="{{ route('stories.show', [$post->user['username'], $post->post_slug]) }}"
                                                class="text-dark fw-bolder ">
                                                {{ \Str::ucfirst($post->post_title) }}</a></h4>
                                    </div>
                                    <div class="post-body mb-3 mx-2">
                                        {!! \Str::limit($post->post_description, 250, '...') !!}
                                    </div>
                                    <div class="d-flex justify-content-arround align-items-center py-3 mb-3">
                                        <a href=""
                                            class="btn btn-light btn-sm rounded-pill">{{ $post->category['category_name'] }}</a>
                                        <span class="ms-2">2 Min Read</span>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-xs-3 my-1  ">
                                <img src="{{ asset('storage/posts/' . $post->post_cover) }}"
                                    class="img-fluid rounded w-100">
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
