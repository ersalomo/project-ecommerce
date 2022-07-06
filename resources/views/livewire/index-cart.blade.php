<div>
    <div class="container-fluid">
        <div class="container">
            <div class="row my-2">
                <div class=" col-md-11 col-lg-7 col-sm-10 mx-auto ">
                    @if (Session::get('success'))
                        <div class=" alert alert-success py-2 mb-0">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row " style="background-color:">
            <div class="col-sm-12 col-md-12 col-lg-7 mx-auto">
                {{-- card --}}
                <div class="card">
                    <div class="card-header">
                        @if ($items > 1)
                            <h4> {{ $items }} Items in your cart</h4>
                        @elseif ($items == 0)
                            <h4>No item in your cart</h4>
                        @elseif ($items <= 1)
                            <h4> {{ $items }} Item in your cart</h4>
                        @endif
                    </div>
                    @foreach ($carts as $cart)
                        <div class="card-body" style="">
                            <div class="row ">
                                <div class="col-4" style="background-color:;">
                                    <img src=" {{ asset('image/products/' . $cart->getProducts->image) }}"
                                        class="img-fluid" alt="{{ $cart->getProducts->name }}">
                                </div>
                                <div class="col-6 offset-1 card shadow-md" style="">
                                    <div class="row mt-1 d-flex flex-row" style="background-color:">
                                        <div class="col-6">
                                            <h5 class="text-" style="">{{ $cart->getProducts->product_name }}
                                            </h5>
                                        </div>
                                        <div class="col-2 py-0 offset-1" style="background-color:;">
                                            <p>Qty:</p>
                                        </div>
                                        <div class="col-2 offset- " style="background-color:">
                                            <select class="form-control py-0 quantity" name="qty"
                                                data-item="{{ $cart->id }}" name="" id="">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option values="{{ $i }}"
                                                        {{ $cart->qty == $i ? 'selected' : '' }}>{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>


                                    <h4 class="text-bold">Rp. {{ number_format($cart->getProducts->price) }}
                                    </h4>
                                    <h6>{{ $cart->getProducts->description }}</h6>

                                    <div class="col-12 mb-2 d-flex flex-row-reverse bd-highlight">
                                        <form wire:submit.prevent="deleteCart({{ $cart->id }})" method="post">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">remove</button>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    @endforeach

                    {{-- subtottal --}}
                    <div class="d-flex flex-row-reverse bd-highlight" style="background-color">
                        <span><strong>Sub total : </strong> </span>
                    </div>
                    <div class="d-flex flex-row-reverse bd-highlight" style="background-color:;">
                        <span><strong>Discount : 10%</strong></span><br>
                    </div>
                    <div class="d-flex flex-row-reverse bd-highlight" style="background-color:;">
                        <span><strong>Total : Rp. {{ number_format($totalPrice, 0) }}</strong></span>
                    </div>
                    <div class="card-footer" style="background-color:;">
                        <div class="d-flex flex-row-reverse bd-highlight" style="background-color:;">
                            @if ($items >= 1)
                                <button class="btn btn-primary btn-md" wire:click="checkout()"
                                    type="submit">Checkout</button>
                            @else
                                <a href="/home-page" class="btn btn-primary btn-md">Back to Home</a>
                            @endif

                        </div>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
        @include('home.modals.modal-checkout')
        @push('scripts')
            <script>
                window.addEventListener('checkOutProduct', (e) => {
                    $('.checkOutProduct').modal('show');
                })
                $(function() {
                    $('.btnBackHome').click(function() {
                        location.href = '{{ route('home-page') }}'
                    })
                    $('.btnToGmail').click(function() {
                        location.href = 'https://gmail.com'
                    })
                })
            </script>
        @endpush
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                console.log(element)
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-item');
                    axios.patch(`/updateCard/${id}`, {
                            quantity: this.value,
                            id: id
                        })
                        .then(function(response) {
                            location.href = "all-cards"
                        })
                        .catch(function(error) {
                            console.log(error)
                        })
                })
            })
        </script>
    </div>
</div>
