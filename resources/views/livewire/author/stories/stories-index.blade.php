  @section('page_title')
      Your Stories
  @endsection
  @section('breadcrumb')
      {{-- resources/views/home.blade.php --}}
      {{ Breadcrumbs::render('stories') }}
  @endsection

  <div>
      <div class="p-2">
          <header class="header">
              <h5 class="mx-3">Your Stories</h5>
              <a data-turbolinks="false" href="{{ route('author.stories.add') }}" class="btn btn-dark rounded">New
                  Story
                  <i class="fas fa-edit"></i></a>
          </header>
          <div class=" bg-white border-bottom">
              <div class="p-3">
                  @if (session()->has('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
                  <ul class="nav nav-underline">
                      <li class="nav-item">
                          <a class="nav-link text-dark " href="{{ route('author.bookmark.index') }}">Saved </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-dark " href="{{ route('author.stories.drafts') }}">Draf </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-dark " href="{{ route('author.stories.publish') }}">Publish
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-dark  text-decoration-underline {{ \Route::is('stories.index' ? 'active' : '') }}"
                              href="{{ route('author.stories.index') }}">All {{ $posts_count }}
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="d-block-lg w-100 mb-3">

              <ul class="list-group list-group-flush mb-3">
                  @foreach ($posts as $index => $post)
                      <li class="list-group-item">

                          <div class="posts mx-md-3">
                              <div class="post-title mb-2">
                                  <h5 class="card-title"><a href="{{ route('author.stories.show', $post->post_slug) }}"
                                          class="text-dark fw-bolder ">
                                          {{ \Str::ucfirst($post->post_title) }}</a></h5>
                                  @if (!is_null($post->publish_date))
                                      <span class="d-inline py-2 ">Published on
                                          {{ date('m/d/Y H:i:s', strtotime($post->publish_date)) }}</span>
                                  @else
                                      <span class="d-inline py-2 ">Unpublished on
                                          {{ date('m/d/Y H:i:s', strtotime($post->unpublish_date)) }}</span>
                                  @endif

                              </div>
                              <div class="post-body">
                                  {!! \Str::limit($post->post_description, 250, '...') !!}
                              </div>
                              <div class="d-flex justify-content-arround py-3 mb-3">
                                  <button wire:click="deletePosts({{ $post->id }})" type="button"
                                      class="btn btn-danger text-white rounded"><i class="fas fa-trash-alt"></i>
                                      Delete</button>
                                  <a data-turbolinks-action="replace" data-turbolinks="false"
                                      href="{{ route('author.stories.edit', $post->id) }}" redirect_to
                                      class="btn btn-danger text-white ms-2 rounded"><i class="fas fa-edit"></i>
                                      Edit</a>

                              </div>
                          </div>
                      </li>
                  @endforeach
              </ul>
          </div>
      </div>
  </div>
