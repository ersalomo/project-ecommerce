<div class="modal fade addProduct" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Product </h5>
                <button type="button" class="button-close btn btn-outline-danger">X</button>
            </div>
            <div class="modal-body">
                {{-- <form wire:submit.prevent="addProduct" method="POST" id="formAdd" enctype="multipart/form-data"> --}}
                <form action="{{ route('admin.addProduct') }}" method="POST" id="formAdd"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Image Product</div>
                        <div class="card-body text-center">
                            <img class="img-account-profile rounded-circle mb-2"
                                src="{{ asset('image/products') }}"alt="">

                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <input type="file" name="gambar" id="addImageProduct" class="form-control"
                                onchange="this.dispatchEvent(new InputEvent
        ('input'))">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Product</label>
                        {{-- <input type="text" class="form-control" wire:model="nm_product" value=""> --}}
                        <input type="text" name="product_name"
                            class="form-control @error('product_name') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- <span class="text-danger"> @error('product_name')
                                {{ $message }}
                            @enderror
                        </span> --}}
                    </div>

                    <div class="form-group">
                        <label for="categoty" class="form-control py-1 my-1">Category
                            {{-- <select id="categoty" wire:model="cat_id" class="form-control mt-1"> --}}
                            <select id="categoty" name="category_id" class="form-control mt-1">
                                <option value="" class="card-title">{{ __('--Choose--') }}</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <span class="text-danger"> @error('cat_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <label for="">Harga Product</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            Rp.
                        </span>
                        <input name="price" type="number" class="form-control" placeholder="Harga product">
                        <span class="input-group-text">
                            ,000
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Description product</label>
                        {{-- <textarea class="form-control btnDisabled" wire:model="desc_product" cols="30" rows="3"></textarea> --}}
                        <textarea class="form-control btnDisabled" name="description" cols="30" rows="3"></textarea>
                        <span class="text-danger"> @error('desc_product')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mt-1">
                        <button type="button" class="btn btn-danger btn-md button-close"
                            data-dismiss="modal">Close</button>
                        <button class="btn btn-primary btn-md" type="submit">Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
