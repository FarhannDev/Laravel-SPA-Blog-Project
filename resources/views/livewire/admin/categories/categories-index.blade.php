<div class="card shadow bg-white rounded">
    <div class="card-header">
        <h4>Daftar Kategori</h4>
    </div>
    <div class="card-body">
        <div class="p-2">

            <button wire:click="$toggle('formShow')" type="button" class="btn btn-dark btn-md rounded mb-3">Add
                Category</button>

            @if ($formShow)
                @livewire('admin.categories.categories-add')
            @endif

            @if (session()->has('success'))
                <x-alert type='success' :message="session('success')"></x-alert>
            @endif

            <div class="row align-content-start">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Dibuat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <th class="align-middle">{{ $index + 1 }}</th>
                                        <th class="align-middle">{{ $category->category_name }}</th>
                                        <th class="align-middle">
                                            {{ date('d/m/Y H:i:s', strtotime($category->created_at)) }}</th>
                                        <th class="align-middle">
                                            <button wire:click="deleteCategory({{ $category->id }})" type="button"
                                                class="btn btn-md btn-danger rounded text-white">Hapus</button>
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
</div>
