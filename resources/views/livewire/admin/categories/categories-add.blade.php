<div class="row justify-content-start">
    <div class="col-md-12">
        <form action="#" wire:submit.prevent="saveCategory">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    id="name" aria-describedby="emailHelp">

                @error('name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Generete Name</label>
                <input type="text" class="form-control " value="{{ \Str::slug($name, '-') }}" readonly id="slug"
                    aria-describedby="emailHelp">
            </div>
            <div class="text-end">
                <button wire:click="$emit('formClose')" type="button" class="btn btn-ligth rounded ">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>

            </div>
        </form>

    </div>
</div>
