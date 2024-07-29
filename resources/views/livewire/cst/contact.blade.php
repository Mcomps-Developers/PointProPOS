<div>
    @section('title')
        Contact
    @endsection
    <div class="page-title mg-top-50">
        <div class="container">
            <a class="float-left" href="{{ route('cst.contact') }}">Home</a>
            <span class="float-right">Contact</span>
        </div>
    </div>
    <!-- page-title end -->

    <!-- contact start -->
    <div class="transaction-area pd-top-36">
        <div class="container">
            <form wire:submit.prevent='send' class="contact-form-wrap">
                <p><strong>Note: </strong> This app will pick your bio data to process your request. Communcation routed
                    to email.</p>
                <ul>
                    <li>
                        <textarea type="text" wire:model.live='message' rows="20" class="form-control" placeholder="Talk to us...."></textarea>
                    @error('message')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </li>
                </ul>
                <button class="btn-large btn-purple w-100" type="submit">
                    <span wire:loading.remove>Send Message</span>
                    <span wire:loading>Processing...</span>
                </button>
            </form>
        </div>
    </div>
</div>
