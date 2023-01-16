@section('page_title')
    Dashboard
@endsection

<div>
    <div class="card shadow rounded bg-white">
        <div class="card-header">
            <div class="text-dark text-capitalize fw-bolder">Profil Saya</div>
        </div>
        <div class="card-body mb-3">
            <div class="profile-container">
                <div class="profile-body mx-md-2">
                    <div class="row justify-content-center ">
                        <div class="col-12">
                            <div class="row justify-content-arround ">
                                <div class="col-lg-4 col-md-12">
                                    <div class="d-flex flex-column">
                                        <img src="{{ \Auth::user()->avatar ? asset('storage/avatar/' . \Auth::user()->avatar) : asset('dist/dashboard/assets/img/avatars/9.jpg') }}"
                                            class=" img-fluid rounded" alt="{{ \Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column">
                                                <div class="col-lg">
                                                    Nama Lengkap :
                                                </div>
                                                <div class="col">
                                                    <p class="m-0 p-0"> {{ \Auth::user()->name }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column">
                                                <div class="col-lg">
                                                    Username :
                                                </div>
                                                <div class="col">
                                                    <p class="m-0 p-0"> {{ \Auth::user()->username }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column">
                                                <div class="col-lg">
                                                    Email :
                                                </div>
                                                <div class="col">
                                                    <p class="m-0 p-0"> {{ \Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column">
                                                <div class="col-lg">
                                                    Bergabung sejak:
                                                </div>
                                                <div class="col">
                                                    <p class="m-0 p-0">
                                                        {{ date('d M Y H:i:s', strtotime(\Auth::user()->created_at)) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column">
                                                <div class="col-lg">
                                                    Bio:
                                                </div>
                                                <div class="col">
                                                    <div>
                                                        -
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <div class="d-inline py-3 mx-3 ">
                                            <a href="#" class="btn btn-dark btn-sm " data-coreui-toggle="modal"
                                                data-coreui-target="#modalEditProfile"><i class="fas fa-edit"></i>
                                                Edit
                                                Profil</a>
                                            <a href="#" class="btn btn-dark btn-sm "><i class="fas fa-trash"></i>
                                                Hapus
                                                Profil</a>
                                            <a href="#" class="btn btn-dark btn-sm " data-coreui-toggle="modal"
                                                data-coreui-target="#modalEditPassword"><i class="fas fa-key"></i>
                                                Ubah
                                                Password</a>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit password -->
    <div wire:ignore.self class="modal fade" id="modalEditPassword" tabindex="-1"
        aria-labelledby="modalEditPasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="modalEditPasswordLabel">Buat Password Baru</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('password_salah'))
                        <div class="alert alert-danger">{{ session('password_salah') }}</div>
                    @endif
                    <form wire:submit.prevent="updatePassword" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="password_lama" class="form-label">Password Lama</label>
                            <input wire:model="password_lama" type="password"
                                class="form-control @error('password_lama') is-invalid @enderror" id="password_lama"
                                placeholder="******">

                            @error('password_lama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input wire:model="password_baru" type="password"
                                class="form-control @error('password_baru') is-invalid @enderror" id="password"
                                placeholder="******">
                            @error('password_baru')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_baru_konfirm" class="form-label">Konfirmasi Password</label>
                            <input wire:model="password_baru_konfirm" type="password"
                                class="form-control @error('password_baru_konfirm') is-invalid @enderror"
                                id="password_baru_konfirm">
                            @error('password_baru_konfirm')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-coreui-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Perbarui Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit profile -->
    <div wire:ignore.self class="modal fade" id="modalEditProfile" tabindex="-1"
        aria-labelledby="modalEditProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditProfileLabel">Edit Profil Saya</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
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
                                <div class="modal-footer">
                                    <div class="d-flex justify-content-end pt-2">
                                        <button type="button" data-coreui-dismiss="modal"
                                            class="btn btn-light">Batalkan</button>
                                        <button type="submit" class="btn btn-dark ms-2">Perbarui</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
