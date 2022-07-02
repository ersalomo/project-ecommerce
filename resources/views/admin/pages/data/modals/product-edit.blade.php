<div class="modal fade editProduct" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Product </h5>
                <button type="button" class="button-close btn btn-outline-danger">XX</button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <form method="POST" action="{{ route('admin.updateImage') }}" id="uploadImage"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group display-inline">
                                    <input type="hidden" name="product_id" wire:model="product_id"
                                        value="{{ $product_id }}">
                                    <img src="{{ asset('image/products/' . $image_product) }}" alt="">
                                    {{-- wire:model="image_product" --}}
                                    <div wire:loading wire:target="image">Uploading...</div>
                                    @error('image')
                                        <span class="error">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row" style="margin-top:25%">
                                    <input type="file" name="gambar"class="form-control-sm my-1 pr-10 btnDisabled">
                                    <button type="submit" class="btn btn-info btnDisabled">change photo</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>

                <form wire:submit.prevent="update" id="formShow">
                    <input type="hidden" name="product_id" wire:model="product_id" value="{{ $product_id }}">
                    <div class="form-group">
                        <label for="">Nama Product</label>
                        <input type="text" class="form-control" wire:model="nm_product" value="">
                        <span class="text-danger"> @error('nm_product')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Harga Product</label>
                        <input type="number" class="form-control" placeholder="Harga product"
                            wire:model="price_product">
                        <span class="text-danger"> @error('price_product')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Description product</label>
                        <textarea class="form-control btnDisabled" wire:model="desc_product" cols="30" rows="3"></textarea>
                        <span class="text-danger"> @error('desc_product')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Created_at</label>
                        <input type="text" class="form-control" wire:model="ct_product" disabled>
                        <span class="text-danger"> @error('ct_product')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-1">
                        <button type="button" class="btn btn-danger btn-md button-close"
                            data-dismiss="modal">Close</button>
                        <button class="btn btn-primary btn-md btnDisabled " id="btnSimpan" type="submit">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
