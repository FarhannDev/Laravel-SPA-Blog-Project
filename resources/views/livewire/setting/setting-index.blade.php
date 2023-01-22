    <div>
        <div class="p-2 bg-white rounded">
            <div class="d-block-lg w-100 mb-3  py-2">
                <header class="header">
                    <h3 class="mx-3">{{ __('Pengaturan Akun') }}</h3>
                </header>
                <div class="row align-content-start">
                    <div class="col-md-12">
                        <div class="d-block-lg w-100 px-3 py-3">

                            @if (session('success'))
                                <x-alert type="success" :message="session('success')"></x-alert>
                            @endif
                            @if (session('password_salah'))
                                <x-alert type="danger" :message="session('password_salah')"></x-alert>
                            @endif
                            <div class="card rounded bg-white mb-3">
                                <div class="card-body">
                                    <h3>Pengaturan Profile Saya</h3>
                                    <hr>
                                    <div class="row align-content-start">
                                        <div class="col-md-12">
                                            <form action="#" wire:submit.prevent="updateProfile">
                                                <div class="col-md-12 mb-3">
                                                    <label for="email" class="form-label">Email
                                                        address</label>
                                                    <input wire:model="email" type="text"
                                                        class="form-control @error('email')is-invalid @enderror"
                                                        id="email">
                                                    @error('email')
                                                        <span id="error"
                                                            class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input wire:model="name" type="text"
                                                        class="form-control  @error('name')is-invalid @enderror"
                                                        id="name">
                                                    @error('name')
                                                        <span id="error"
                                                            class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input wire:model="username" type="text"
                                                        class="form-control  @error('username')is-invalid @enderror"
                                                        id="username">
                                                    @error('username')
                                                        <span id="error"
                                                            class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="avatar" class="form-label">Upload
                                                        Avatar</label>
                                                    <input wire:model="avatar"
                                                        class="form-control  @error('avatar') is-invalid @enderror"
                                                        type="file" id="formFile">
                                                    @error('avatar')
                                                        <span id="error"
                                                            class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="bio" class="form-label">Bio</label>
                                                    <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" rows="6"></textarea>
                                                    @error('bio')
                                                        <span id="error"
                                                            class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-dark btn-md">Update
                                                            Profile</button>
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
                <div class="row align-content-start">
                    <div class="col-md-12">
                        <div class="d-block-lg w-100 p-3">
                            <div class="card rounded bg-white">
                                <div class="card-body">
                                    <h3>Pengaturan Kata Sandi</h3>
                                    <hr>
                                    <div class="row align-content-start">
                                        <div class="col-md-12">
                                            <div class="d-block-lg w-100">
                                                <form wire:submit.prevent="updatePassword">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="password_lama" class="form-label">Password
                                                            Lama</label>
                                                        <input wire:model="password_lama" type="password"
                                                            class="form-control  @error('password_lama') is-invalid @enderror"
                                                            id="password_lama">
                                                        @error('password_lama')
                                                            <span id="error"
                                                                class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="password_baru" class="form-label">Password
                                                            Baru</label>
                                                        <input wire:model="password_baru" type="password"
                                                            class="form-control  @error('password_baru') is-invalid @enderror"
                                                            id="password_baru">
                                                        @error('password_baru')
                                                            <span id="error"
                                                                class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="password_baru_konfirm" class="form-label">Konfirmasi
                                                            Password</label>
                                                        <input wire:model="password_baru_konfirm" type="password"
                                                            class="form-control  @error('password_baru_konfirm') is-invalid @enderror"
                                                            id="password_baru_konfirm">
                                                        @error('password_baru_konfirm')
                                                            <span id="error"
                                                                class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-dark btn-md">Update
                                                                Password</button>
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
                </div>
            </div>
        </div>
    </div>
