<div>
    @section('page_title')
        Editing {{ $post_title }}
    @endsection
    <div class="card shadow rounded bg-white">
        <div class="card-header">
            <h5>Editing {{ $post_title }}</h5>
        </div>
        <div class="card-body mb-3">
            <div class="d-block-lg w-100 px-md-3">

                <div class="d-flex justify-content-center align-content-start border-bottom ">
                    <div class="col-12">
                        <form wire:submit.prevent="updatePosts" enctype="multipart/form-data">
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
                                <label for="post_slug" class="form-label">Generate SEO</label>
                                <input type="text" class="form-control" id="post_slug"
                                    value="{{ \Str::slug($post_title, '-') }}" readonly>
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
                                <label for="formFile" class="form-label">Upload Thumbail</label>
                                <input wire:model="post_cover"
                                    class="form-control  @error('post_cover')is-invalid @enderror" type="file"
                                    id="formFile">
                                <div wire:loading wire:target="post_cover">Uploading...</div>
                                @error('post_cover')
                                    <span class="invalid-feedback">{{ $message }} </span>
                                @enderror
                                @if ($post_cover)
                                    <div class="d-flex justify-content-center my-3">
                                        <img class="img-fluid rounded " src="{{ $post_cover->temporaryUrl() }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center my-3">
                                        <img src="{{ $post_cover_original }}" width="350" class="img-fluid my-3">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="mb-3" wire:ignore>
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                    <textarea type="text" input="post_description" wire:model="post_description" id="summernote"
                                        class="summernote form-control">{{ $post_description }}</textarea>
                                    @error('post_description')
                                        <div class="invalid-feedback error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-3">

                                <a href="{{ route('stories.index') }}" class="btn btn-light ms-1">Cancel</a>
                                <button data-turbolinks="true" type="submit"
                                    class="btn btn-dark rounded ms-2">Publish</button>
                            </div>
                        </form>
                    </div>
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
