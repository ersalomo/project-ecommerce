@extends('home.home-page')
@section('title', 'Detail Product')
@section('content')
    <main class="mt-2 pt-4">
        <div class="container dark-grey-text mt-0">
            @if (Session::get('error'))
                <div class="alert alert-important alert-warning alert-dismissible col-4 mx-auto                                                                                                         "
                    role="alert">
                    <div class="d-flex">
                        <div>
                            {{ Session::get('error') }}
                        </div>
                    </div>
                    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            <div class="row wow fadeIn">

                <div class="col-md-6 mb-4">
                    <img src="{{ $product->image }}" class="img-fluid" alt="">
                </div>

                <div class="col-md-6 mb-4">
                    <!--Content-->
                    <div class="p-4">
                        <div class="mb-3">
                            <h4>{{ $product->product_name }}</h4>
                        </div>
                        <p class="lead">
                            <span class="mr-1">
                                <del>Rp. {{ number_format($product->price - 100_000) }}</del>
                            </span>
                            <span>Rp.{{ number_format($product->price) }}</span>
                        </p>
                        <p class="lead font-weight-bold text-bold">Description</p>
                        <p>{{ $product->description }}</p>
                        <form class="d-flex justify-content-left" method="post" action="{{ route('add-card') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            <button class="btn btn-info btn-md my-0" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart-check" viewBox="0 0 16 16">
                                    <path
                                        d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                Add to cart
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-center wow fadeIn">
                <div class="col-md-6 text-center">

                    <h4 class="my-4 h4">Additional information</h4>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta
                        odit
                        voluptates,
                        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

                </div>

            </div>
            <div class="row wow fadeIn">

                <div class="col-lg-4 col-md-12 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid"
                        alt="">
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid"
                        alt="">

                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid"
                        alt="">

                </div>
            </div>
        </div>
    </main>
@endsection
