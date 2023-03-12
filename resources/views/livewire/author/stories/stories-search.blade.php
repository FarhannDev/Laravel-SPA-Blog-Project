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
             <h4 class="text-dark">Cari Semua Postingan</h4>
         </header>

         <div class="row justify-content-center pt-3">
             <div class="col-lg-8">
                 <div class="input-group mb-3">
                     <input wire:model.debounce.500ms="query" type="text" class="form-control"
                         placeholder="Cari Postingan..." aria-label="Cari Postingan..." aria-describedby="button-addon2">
                     <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                             class="fas fa-search"></i></button>
                 </div>
             </div>
             <div class="col-lg-4" wire:ignore.self>
                 <div class="input-group mb-3">
                     <select wire:model="category" class="form-select" aria-label="Default select example">
                         <option value="">Pilih Semua Kategori</option>
                         @foreach ($categories as $key => $category)
                             <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                         @endforeach
                     </select>
                 </div>
             </div>
         </div>


         @if ($query || $category)
             @if (!$posts->count())
                 <div class="align-content-center pt-3  mb-3">
                     <div class="text-center">
                         <span>Postingan tidak tersedia.</span>
                     </div>
                 </div>
             @else
                 <div class="row align-content-start flex-wrap pt-3">
                     @foreach ($posts as $key => $post)
                         <div class="col-md-4 col-sm-10">
                             <div class="d-block-lg w-100">
                                 <div class="card mb-3 bg-white rounded" id="story-{{ $post->id }}">
                                     <a href="{{ route('story.detail', [$post->user['username'], $post->post_slug]) }}">
                                         <figure class="figure m-0 p-0">
                                             <img src="{{ $post->post_cover ? asset('storage/story/' . $post->post_cover) : asset('images/default.png') }}"
                                                 class="figure-img img-fluid  w-100" alt="...">
                                         </figure>
                                     </a>
                                     <div class="card-body">
                                         <div class="row align-content-end justify-content-end">
                                             <div class="col">
                                                 <div class="text-end">
                                                     <button type="button"
                                                         class="btn btn-sm btn-light rounded-pill">{{ $post->category['category_name'] }}</button>

                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row align-content-start">
                                             <div class="col-md-12">
                                                 <a href="{{ route('story.detail', [$post->user['username'], $post->post_slug]) }}"
                                                     class="text-dark">
                                                     <h5>{{ \Str::limit($post->post_title, '50') }}</h5>
                                                 </a>
                                             </div>
                                         </div>
                                         <div class="row align-content-start py-3">
                                             <div class="col-md-12">
                                                 {{-- <div class="d-block-lg w-100"> --}}
                                                 {{ \Str::limit(strip_tags($post->post_description), 150) }}
                                                 {{-- </div> --}}
                                             </div>
                                         </div>
                                         <div class="row align-content-start">
                                             <div class="col-lg-10 col-md-10">
                                                 <div class="d-block-lg w-100">
                                                     <div class="d-flex justify-content-start">
                                                         <div class="col-1">
                                                             <span class="d-inline-block">
                                                                 <a href=""
                                                                     class="text-dark text-decoration-none">
                                                                     <img src=" {{ asset('storage/avatar/author-63c156869b047.jpg') }}"
                                                                         class="img-fluid rounded-circle"
                                                                         width="50">

                                                                 </a>
                                                             </span>
                                                         </div>
                                                         <div class="col-lg-10">
                                                             <div class="d-flex flex-column">
                                                                 <span class="d-inline">
                                                                     <a href="{{ route('author.profile.public', $post->user->username) }}"
                                                                         class="text-dark text-decoration-none">
                                                                         {{ $post->publish_by }}
                                                                     </a>
                                                                 </span>
                                                                 <span class="d-inline text-capitalize">
                                                                     {{ date('d M Y', strtotime($post->publish_date)) }}
                                                                 </span>
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
                     @endforeach
                 </div>
             @endif
         @else
             <div class="align-content-center pt-3  mb-3">
                 <div class="text-center">
                     <span>Belum ada pencarian.</span>
                 </div>
             </div>
         @endif


     </div>
 </div>
