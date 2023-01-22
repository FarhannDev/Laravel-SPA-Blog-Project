  @section('page_title')
      Postingan Saya
  @endsection
  @section('breadcrumb')
      {{-- resources/views/home.blade.php --}}
      {{ Breadcrumbs::render('stories') }}
  @endsection

  <div>
      <div class="p-2">
          <header class="header">
              <h3 class="mx-3">Postingan Saya </h3>
              <a data-turbolinks="false" href="{{ route('author.stories.add') }}" class="btn btn-dark rounded">Buat
                  Postingan
                  <i class="fas fa-edit"></i></a>
          </header>
          <div class=" bg-white border-bottom">
              <div class="p-3">
                  @if (session()->has('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif

                  @role('author')
                      <ul class="nav nav-underline">
                          <li class="nav-item">
                              <a class="nav-link text-dark " href="{{ route('author.stories.drafts') }}">Draft </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-dark " href="{{ route('author.stories.publish') }}">Publish
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-dark  text-decoration-underline {{ \Route::is('stories.index' ? 'active' : '') }}"
                                  href="{{ route('author.stories.index') }}">Semua {{ $posts_count }}
                              </a>
                          </li>
                      </ul>
                  @endrole
              </div>
          </div>
          <div class="d-block-lg w-100 mb-3 bg-white">

              @role('author')
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
                                      {!! \Str::limit(strip_tags($post->post_description), '200') !!}
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
              @endrole

              @role('admin')
                  <div class="row w-100 mb-3">
                      <div class="table-responsive col-md-12 p-3">
                          <table class="table table-stripped" style="width: 100%;">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Category</th>
                                      <th scope="col">Author</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Created</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  @foreach ($postsAdmin as $key => $post)
                                      <tr>
                                          <th class="align-middle">
                                              {{ ($postsAdmin->currentpage() - 1) * $postsAdmin->perpage() + $loop->index + 1 }}
                                          </th>
                                          <td class="align-middle col-5">
                                              <a href="{{ route('author.stories.show', $post->post_slug) }}"
                                                  class="text-dark">
                                                  {{ $post->post_title }}
                                              </a>

                                          </td>
                                          <td class="align-middle">{{ $post->category['category_name'] }}</td>
                                          <td class="align-middle">{{ $post->user['name'] }}</td>
                                          <td class="align-middle">{{ $post->status }}</td>
                                          <td class="align-middle">{{ date('m/d/Y', strtotime($post->created_at)) }}</td>
                                          <td class="align-middle">
                                              <div class="d-inline">
                                                  <button wire:click="deletePosts({{ $post->id }})" type="button"
                                                      class="btn btn-danger text-white rounded"><i
                                                          class="fas fa-trash-alt"></i>
                                                      Delete</button>
                                                  <a data-turbolinks="false"
                                                      href="{{ route('author.stories.edit', $post->id) }}"
                                                      class="btn btn-md btn-danger rounded text-white">Update</a>
                                              </div>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>

                  </div>
              @endrole
          </div>
      </div>
  </div>
