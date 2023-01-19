@section('page_title')
    New Story - NgeblogId
@endsection
@section('breadcrumb')
    {{-- resources/views/home.blade.php --}}
    {{ Breadcrumbs::render('new-story') }}
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>Blank</span></li>
        </ol>
    </nav> --}}
@endsection
<div>
    <div class="p-2">
        <header class="header">
            <h3 class="mx-3">New Story</h3>
        </header>
        <div class="d-block-lg w-100 bg-white p-3">

            <div class="d-flex justify-content-center align-content-start ">
                <div class="col-12">
                    <form wire:submit.prevent="savePosts" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="post_title" class="form-label">Judul Postingan</label>
                            <input wire:model="post_title" type="text"
                                class="form-control @error('post_title')is-invalid @enderror " id="post_title"
                                autocomplete="additional-name">
                            @error('post_title')
                                <span class="invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="post_categorie_id" class="form-label">Kategori Postingan</label>
                            <select wire:model="post_categorie_id"
                                class="form-select @error('post_categorie_id')is-invalid @enderror">
                                <option value="" selected>Pilih Kategori Postingan</option>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                @endforeach

                            </select>
                            @error('post_categorie_id')
                                <span class="invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Postingan</label>
                            <select wire:model="status" class="form-select @error('status')is-invalid @enderror">
                                <option value="" selected>Pilih Status Postingan</option>
                                <option value="unpublish">Unpublish</option>
                                <option value="publish">Publish</option>

                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Thumbnail</label>
                            <input wire:model="post_cover"
                                class="form-control  @error('post_cover')is-invalid @enderror" type="file"
                                id="formFile">
                            <div wire:loading wire:target="post_cover">Uploading...</div>
                            @error('post_cover')
                                <span class="invalid-feedback">{{ $message }} </span>
                            @enderror
                            @if ($post_cover)
                                <div class="d-flex justify-content-center">
                                    <img src="{{ $post_cover->temporaryUrl() }}" width="350"
                                        class="img-fluid rounded my-3">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="mb-3" wire:ignore>
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea type="text" input="post_description" wire:model="post_description" id="summernote"
                                    class="summernote form-control  @error('post_description')is-invalid @enderror">{{ $post_description }}</textarea>
                                @error('post_description')
                                    <div class="invalid-feedback error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <a data-turbolinks="true" href="{{ route('author.stories.index') }}"
                                class="btn btn-light ">Cancel</a>
                            <button data-turbolinks="true" type="submit"
                                class="btn btn-dark rounded ms-2">Publish</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@prepend('javascript')
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['help']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('post_description', contents);
                }
            },
        });
    </script>
@endprepend
