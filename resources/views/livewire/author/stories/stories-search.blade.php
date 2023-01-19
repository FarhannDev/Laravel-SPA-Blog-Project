 @section('page_title')
     NgeBlogID
 @endsection
 @section('breadcrumb')
     {{-- resources/views/home.blade.php --}}
     {{ Breadcrumbs::render('search-story') }}
 @endsection

 <div>

     <div class="p-3 bg-white rounded">
         <header class="header mb-3">
             <h4 class="text-dark">Search All Story</h4>
         </header>

         <div class="row justify-content-center pt-3">
             <div class="col-lg-6">
                 <div class="input-group mb-3">
                     <input wire:model.debounce.500ms="search" type="text" class="form-control"
                         placeholder="Search All Story..." aria-label="Search All Story..."
                         aria-describedby="button-addon2">
                     <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                             class="fas fa-search"></i></button>
                 </div>
             </div>
         </div>

         @if ($search)
             <div class="row ustify-content-center g-3 py-5 ">
                 @if ($posts->count())
                     @foreach ($posts as $key => $post)
                         <div class="col-lg-4 col-md-6">
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
                                             <a href="#"
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
                 @else
                     <div class="d-flex justify-content-center py-2">
                         Story Not Found
                     </div>
             </div>
         @endif
     @else
         <div class="d-flex justify-content-center py-2">
             No Search stories yet
         </div>

         @endif

     </div>
 </div>
