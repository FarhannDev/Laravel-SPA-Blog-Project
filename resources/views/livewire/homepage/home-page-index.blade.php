<div>
    @section('page_title')
        NgeBlogID - All Story
    @endsection
    @section('breadcrumb')
        {{-- resources/views/home.blade.php --}}
        {{ Breadcrumbs::render('home') }}
    @endsection

    <div class="p-3 bg-white rounded">
        <header class="header mb-3">
            <h4 class="text-dark">All Story</h4>
        </header>
        <div class="row ">
            <div class="col-lg-12">
                <div class="row g-3 ">
                    @foreach ($posts as $key => $post)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card rounded bg-white mb-3" style="height: auto;">
                                <a href="{{ route('story.detail', [$post->user->username, $post->post_slug]) }}">
                                    <img src="{{ asset('storage/posts/' . $post->post_cover) }}" class="card-img-top"
                                        height="300">
                                </a>
                                <div class="card-body">
                                    <div class="posts-container">
                                        <div class="post-container-title mb-3">
                                            <a href=""
                                                class="btn btn-light btn-sm rounded-pill mb-2">{{ $post->category['category_name'] }}</a>
                                            <a href="{{ route('story.detail', [$post->user->username, $post->post_slug]) }}"
                                                class="text-dark mb-3">
                                                <h4 class="text-left">
                                                    {{ \Str::limit(\Str::ucfirst($post->post_title), 50, '...') }}</h4>
                                            </a>
                                            <div class="post-container-desc mb-3"> {!! \Str::limit($post->post_description, 100, '...') !!}</div>
                                        </div>
                                        <div class="d-flex flex-wrap mb-3">
                                            <a href="{{ route('author.profile.public', $post->user['username']) }}"
                                                class="btn btn-link m-0 p-0 text-decoration-none text-dark">
                                                <div class="author-info">
                                                    <span>
                                                        <img src="{{ asset('storage/avatar/' . $post->user['avatar']) }}"
                                                            class="img-fluid rounded-circle" width="40">
                                                    </span>
                                                    <span>{{ $post->user['name'] }}</span>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
