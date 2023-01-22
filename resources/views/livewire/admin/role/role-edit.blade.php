<div>
    <div class="row justify-content-start mb-3">
        <div class="col-md-12">
            <form wire:submit.prevent="update">
                <div class="mb-3 ">
                    <label for="name" class="form-label">Role Name</label>
                    <input wire:model="name" type="text" class="form-control @error('name')  is-invalid @enderror"
                        id="name">
                    @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 " wire:ignore.self>
                    <label for="name" class="form-label">Role Description</label>
                    <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                </div>
                <div class="mb-3">
                    <div class="text-end">
                        <button wire:click="$emit('closeButton')" type="button"
                            class="btn btn-light rounded">Cancel</button>
                        <button type="submit" class="btn btn-dark rounded">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
