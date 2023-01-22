    @section('page_title')
        NgeBlogID
    @endsection
    @section('breadcrumb')
        {{-- resources/views/home.blade.php --}}
        {{ Breadcrumbs::render('profile-edit', $usname) }}
    @endsection


    <div>
        <div class="p-2 mb-3">
            <div class="d-block-lg w-100 mb-3  py-2">
                <header class="header">
                    <a href="{{ route('author.profile.about', Auth::user()->username) }}"
                        class="btn btn-link text-dark text-decoration-none"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </header>

                <div class=" bg-white border-bottom">
                    <div class="row pt-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            @if ($avatar)
                                <img src="{{ $avatar->temporaryUrl() }}" width="250"
                                    class="img-fluid rounded mb-3 px-3" alt="">
                            @else
                                <img src="{{ \Auth::user()->avatar ? asset('http://ngeblogid.test/storage/avatar/' . $avatarOrigin) : Gravatar::get('email@example.com', ['size' => 50]) }}"
                                    width="250" class="img-fluid rounded px-3 mb-3" alt="">
                            @endif

                        </div>
                        <div class="col-lg-8 col-md-6">
                            <form method="#" wire:submit.prevent="ProfileUpdate" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row px-3">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> Name :</label>
                                    <div class="col-sm-9">
                                        <input wire:model="name" type="text"
                                            class="form-control @error('name')
                                          is-invalid
                                        @enderror"
                                            id="staticEmail">
                                    </div>
                                </div>
                                <div class="mb-3 row px-3">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> Username :</label>
                                    <div class="col-sm-9">
                                        <input wire:model="usname" type="text"
                                            class="form-control @error('usname') is-invalid @enderror" id="staticEmail">
                                    </div>
                                </div>
                                <div class="mb-3 row px-3">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> Email :</label>
                                    <div class="col-sm-9">
                                        <input wire:model="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" id="staticEmail">
                                    </div>
                                </div>
                                <div class="mb-3 row px-3">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> Upload :</label>
                                    <div class="col-sm-9">
                                        <input wire:model="avatar"
                                            class="form-control @error('avatar') is-invalid @enderror" type="file"
                                            id="formFile">
                                    </div>
                                </div>
                                <div class="mb-3 row px-3">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> Bio :</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" cols="10"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3  px-3 d-flex justify-content-end">
                                    <a href="{{ route('author.profile.about', Auth::user()->username) }}"
                                        class=" btn btn-light rounded">Cancel</a>
                                    <button type="submit" class=" btn btn-dark rounded ms-1">Edit Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
