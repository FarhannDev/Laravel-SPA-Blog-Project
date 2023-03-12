<div class="card bg-white rounded ">
    <div class="card-header">
        <a data-turbolinks="false" href="{{ route('admin.user.index') }}"
            class="btn btn-link text-dark text-decoration-none"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">
        <div class="p-3">
            <div class="row justify-content-start mb-3">
                <div class="col-md-12">
                    <form wire:submit.prevent="saveUser">
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Name</label>
                            <input wire:model="name" type="text"
                                class="form-control @error('name')  is-invalid @enderror" id="name">
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="username" class="form-label">Username</label>
                            <input wire:model="username" type="text"
                                class="form-control @error('username')  is-invalid @enderror" id="username">
                            @error('username')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model="email" type="email"
                                class="form-control @error('email')  is-invalid @enderror" id="email"
                                aria-describedby="emailHelp">
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputPassword1" class="form-label">Role</label>
                            <select wire:model="role" class="form-select">
                                <option value="">Select Role User</option>
                                @foreach ($roles as $key => $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input wire:model="password" type="password" class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
                            <input wire:model="password_confirmation" type="password" class="form-control"
                                id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <div class="text-end">
                                <a data-turbolinks="false" href="{{ route('admin.user.index') }}"
                                    class="btn btn-light rounded">Cancel</a>
                                <button type="submit" class="btn btn-dark rounded">Create User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
