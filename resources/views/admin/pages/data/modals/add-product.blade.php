<div class="modal fade addProduct" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Product </h5>
                <button type="button" class="button-close btn btn-outline-danger">X</button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="addProduct" method="POST" id="formAdd">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Product</label>
                        <input type="text" class="form-control" wire:model="nm_product" value="">
                        <span class="text-danger"> @error('nm_product')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="categoty" class="form-control py-1 my-1">Category
                            <select id="categoty" wire:model="cat_id" class="form-control mt-1">
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
