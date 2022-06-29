<div class="modal fade editProduct" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Product </h5>
                <button type="button" class="button-close">X{{-- <span aria-hidden="true">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                {{-- form  upload gambar --}}
                <div class="col-auto d-md-flex">
                    {{-- connecting to profile.blade --}}
                    <input type="file" name="file" id="changeAuthorPictureFile" class="d-none"
                        onchange="this.dispatchEvent(new InputEvent
    ('input'))">
                    <a href="#" class="btn btn-primary"
                        onclick="event.preventDefault();document.getElementById('changeAuthorPictureFile'). click();">
                        Change Picture
                    </a>
                </div>
                <div class="row">
                    <form wire.click.prevent="uploadImage">
                        <div class="form-group" style="padding-left:25%;">
                            <img src="{{ $image_product }}" class="img-fluid" style="width:50%; height:50%;"
                                wire:model="image_product" alt="image product" srcset="">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" style="width:50%; height:50%;">
                            @endif
                            <input type="file" class="form-control-sm my-1 pr-10" wire:model="image">
                            <div wire:loading wire:target="image">Uploading...</div>
                            @error('image')
                                <span class="error">
                                    {{ $message }}
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-info btnDisabled">change photo</button>
                        </div>
                    </form>

                </div>
                <form wire:submit.prevent="update" id="formShow">
                    <input type="hidden" wire:model="product_id">
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
                        <textarea class="form-control" wire:model="desc_product" cols="30" rows="3"></textarea>
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
