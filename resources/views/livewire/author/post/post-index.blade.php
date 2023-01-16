<div>
    @section('page_title')
        Semua Postingan Saya
    @endsection
    <div class="card shadow rounded bg-white">
        <div class="card-header bg-white">
            <h5>Semua Postingan Saya</h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-arround mb-3">
                <div class="col-lg-4 col-md-12">
                    <div class=" mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cari Postingan:</label>
                        <input wire:model.debounce.500ms="search" type="text" class="form-control"
                            aria-describedby="button-addon2">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" wire:ignore>
                    <div class=" mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cari Kategori Postingan</label>
                        <select wire:model="category_select" class="form-select">
                            <option selected value="">Pilih Semua Kategori Postingan</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat['category_name'] }}">{{ $cat['category_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" wire:ignore>
                    <div class=" mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cari Status Postingan:</label>
                        <select wire:model="status" class="form-select">
                            <option selected value="">Pilih Semua Status Postingan</option>
                            <option value="publish">Publish</option>
                            <option value="unpublish">Unpublish</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('author.posts.add') }}" class="btn btn-dark rounded">Buat Postingan Baru <i
                        class="fas fa-plus"></i></a>
            </div>
            @if (session()->has('success'))
                <div class="notification-message mt-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="d-block-lg w-100 mb-3">

                @if (!$posts->count())
                    <div class="d-flex justify-content-center mt-3">
                        <span class="text-capitalize text-dark fw-bolder">
                            Post {{ $search }} not found.
                        </span>
                    </div>
                @endif

                {{-- @if ($search)
                    <div class="d-flex justify-content-start mt-3">
                        <p class="text-capitalize">
                            Showing Search <span class="fw-bolder">{{ $search }} </span> :
                        </p>
                    </div>
                @endif --}}

                @foreach ($posts as $index => $post)
                    {{-- <a href="#" class="text-decoration-none text-dark"> --}}
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="posts">
                                <div class="post-title">
                                    <div class="d-flex justify-content-end">
                                        @if ($post->status === 'publish')
                                            <span class="badge rounded-pill text-bg-success ">Publish</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-danger ">Unpublish</span>
                                        @endif
                                    </div>
                                    <h5 class="card-title"><a href="{{ route('author.posts.show', $post->post_slug) }}"
                                            class="text-dark">
                                            {{ \Str::ucfirst($post->post_title) }}</a></h5>

                                </div>
                                <div class="post-body">
                                    {!! \Str::limit($post->post_description, 200, '...') !!}
                                    <div class="d-flex justify-content-arround mt-3 mb-3">
                                        <button wire:click="deletePosts({{ $post->id }})" type="button"
                                            class="btn btn-danger text-white rounded"><i class="fas fa-trash-alt"></i>
                                            Delete</button>
                                        <a href="{{ route('author.posts.edit', $post->post_slug) }}"
                                            class="btn btn-danger text-white ms-2 rounded"><i class="fas fa-edit"></i>
                                            Edit</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </a> --}}
                @endforeach
            </div>
            <div class="d-flex justify-content-center showPagination">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
