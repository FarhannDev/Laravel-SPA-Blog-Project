<div class="card bg-white rounded">
    <div class="card-header bg-white">
        <h4 class="text-dark text-capitalize fw-bolder">
            User List
        </h4>
    </div>
    <div class="card-body">
        <div class="row justify-content-arround align-content-start mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Search By Name</label>
                    <input wire:model.debounce.500ms="search" type="text" class="form-control "
                        id="exampleInputEmail1" autocomplete="additional-name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Search By Email</label>
                    <input wire:model.debounce.300ms="email" type="text" class="form-control "
                        id="exampleInputEmail1" autocomplete="email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3" wire:ignore.self>
                    <label for="exampleInputEmail1" class="form-label">Search By Role</label>
                    <select wire:model="role"class="form-select form-select " aria-label=".form-select-sm example">
                        <option value="">Select All Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-12">
                <div class="text-end mb-3">
                    <a data-turbolinks="false" href="{{ route('admin.user.add') }}" type="button"
                        class="btn btn-dark rounded">Add New
                        User</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th class="align-middle">{{ $key + 1 }}</th>
                                    <th class="align-middle">{{ !is_null($user->uuid) ? $user->uuid : '-' }}</th>
                                    <th class="align-middle">
                                        @if (is_null($user->uuid))
                                            <a href="#" class="text-dark text-decoration-none">
                                                {{ $user->name }}</a>
                                        @else
                                            <a data-turbolinks="false"
                                                href="{{ route('admin.user.edit', $user->uuid) }}"
                                                class="text-dark text-decoration-none">
                                                {{ $user->name }}</a>
                                        @endif
                                    </th>
                                    <th class="align-middle">{{ $user->username }}</th>
                                    <th class="align-middle">{{ $user->email }}</th>
                                    @foreach ($user->roles as $key => $role)
                                        <th class="align-middle">{{ $role->display_name }}</th>
                                    @endforeach
                                    <th class="align-middle">{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}
                                    </th>
                                    <th class="align-middle">
                                        <button wire:click="deleteUser({{ $user->id }})" type="button"
                                            class="btn btn-danger btn-md rounded text-white">Remove</button>
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@prepend('javascript')
    {{-- <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var path = "{{ route('admin.user.index') }}";
        $('.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endprepend
