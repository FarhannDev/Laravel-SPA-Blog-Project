@section('page_title')
    Dashboard - RoleUser
@endsection

<div class="card bg-white rounded">
    <div class="card-header">
        <h5 class="text-dark text-capitalize fw-bolder">
            Management User Role
        </h5>
    </div>
    <div class="card-body">

        <div class="text-end">
            <button wire:click="$toggle('formVisible')" type="button" class="btn btn-dark btn-md rounded">Add New
                Role</button>
        </div>

        @if (session()->has('success'))
            <x-alert type="success" :message="session('success')"></x-alert>
        @endif

        @if ($formVisible)
            @if (!$formUpdate)
                @livewire('admin.role.role-add')
            @else
                @livewire('admin.role.role-edit')
            @endif
        @endif
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">DisplayName</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <th class="align-middle">{{ $key + 1 }}</th>
                                    <th class="align-middle">{{ $role->name }}</th>
                                    <th class="align-middle">{{ $role->display_name }}</th>
                                    <th class="align-middle">{{ $role->description }}</th>
                                    <th class="align-middle">{{ date('d/m/Y H:i:s', strtotime($role->created_at)) }}
                                    </th>
                                    <th class="align-middle">
                                        <button wire:click="editRole({{ $role->id }})" type="button"
                                            class="btn btn-danger btn-md rounded text-white">Update</button>
                                        <button wire:click="deletedRole({{ $role->id }})" type="button"
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
