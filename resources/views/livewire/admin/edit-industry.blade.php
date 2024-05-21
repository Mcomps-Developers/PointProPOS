<div class="modal-dialog modal-dialog-centered custom-modal-two">
    <div class="modal-content">
        <div class="page-wrapper-new p-0">
            <div class="content">
                <div class="modal-header border-0 custom-modal-header">
                    <div class="page-title">
                        <h4>Edit {{$name}}</h4>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body">
                    <form wire:submit='saveChanges'>
                        <div class="mb-3">
                            <label class="form-label">Industry Name</label>
                            <input type="text" class="form-control" wire:model='name' value="{{$name}}">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="modal-footer-btn">
                            <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-submit" wire:target="saveChanges"
                                wire:loading.remove>Save Changes</button>
                            <button class="btn btn-warning-light" type="button" disabled wire:target="saveChanges"
                                wire:loading>
                                <span class="spinner-grow spinner-grow-sm align-middle" role="status"
                                    aria-hidden="true"></span>
                                Saving...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
