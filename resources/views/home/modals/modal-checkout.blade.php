{{-- <div class="modal-dialog modal-sm" role="document"> --}}
<div wire:ignore.self class="modal fade checkOutProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-success"></div>
            <div class="modal-body text-center py-4">
                <h3>Checkout Successfully</h3>
                <div class="text-muted">Your payment of Rp. {{ $totalPrice }} has been successfully submitted. Your
                    Product Detail has been sent
                    to
                    {{ $userEmail }}.</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('home-page') }}" class="btn w-100 btnBackHome" data-bs-dismiss="modal">
                                Go to home
                            </a>
                        </div>
                        <div class="col">
                            <a href="https://gmail.com" target="_blank" class="btn btn-success btnToGmail w-100"
                                data-bs-dismiss="modal">
                                View email
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
