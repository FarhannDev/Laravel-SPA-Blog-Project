<div>
    <div class="card shadow rounded bg-white mb-3">
        <div class="card-header">
            <span>Profile Setting</span>
        </div>
        <div class="card-body">
            <div class="profile-container">
                <div class="d-flex flex-column">
                    <div class="profile-avatar text-center mb-3">
                        @if ($avatar)
                            <img width="350" src="{{ $avatar->temporaryUrl() }}" class=" img-fluid rounded">
                        @else
                            <img width="350"
                                src="{{ \Auth::user()->avatar ? $avatar_origin : asset('dist/dashboard/assets/img/avatars/9.jpg') }}"
                                class=" img-fluid rounded" alt="{{ \Auth::user()->name }}">
                        @endif

                    </div>
                    <div class="profile-edit pt-3 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-12">
                                <form wire:submit.prevent="updateProfile" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input wire:model="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" id="name">

                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input wire:model="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" id="username">

                                        @error('username')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input wire:model="email" type="text"
                                            class="form-control  @error('email') is-invalid @enderror" id="email"
                                            aria-describedby="emailHelp">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload</label>
                                        <input wire:model="avatar"
                                            class="form-control @error('avatar') is-invalid @enderror" type="file"
                                            id="formFile">
                                        @error('avatar')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" cols="10" placeholder="-"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end pt-2">
                                        <button type="submit" class="btn btn-dark">Perbarui</button>
                                        <a href="{{ route('author.profile.index') }}"
                                            class="btn btn-dark ms-1">Batalkan</a>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
