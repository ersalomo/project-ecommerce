<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Category;
use Livewire\WithFileUploads;

class ListProducts extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $paginator = 10;
    public $product_id, $nm_product, $price_product, $image_product, $desc_product, $ct_product;

    public $image;

    public function mount()
    {
    }

    public function render()
    {
        if ($this->paginator <= 0) {
            session()->flash('success', 'Tidak bisa showing data bernilai 0');
            $this->paginator = 1;
        }

        $products = Product::orderBy('id')->paginate($this->paginator);
        $categories = Category::all();
        return view('livewire.data.list-products', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $this->product_id    = $id;
        $this->nm_product    = $product->product_name;
        $this->price_product = $product->price;
        $this->image_product = $product->image;
        $this->desc_product  = $product->description;
        $this->ct_product    = $product->created_at;
        $this->dispatchBrowserEvent('showProduct');
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        $this->product_id    = $id;
        $this->nm_product    = $product->product_name;
        $this->price_product = $product->price;
        $this->image_product = $product->image;
        $this->desc_product  = $product->description;
        $this->ct_product    = $product->created_at;
        // $this->emit('userStore');
        $this->dispatchBrowserEvent('editproduct', [
            'id' => $id
        ]);
    }
    function update()
    {
        $product_id = $this->product_id;
        $this->validate([
            'nm_product' => 'required',
            'price_product' => 'required|numeric',
            'desc_product' => 'required'
        ], [
            'nm_product.required'    => 'Masukkan nama product',
            'price_product.required' => 'Masukkan harga product',
            'price_product.numeric'   => 'Masukkan data hanya berupa angka',
            'desc_product.required'  => 'Masukkan description product'
        ]);

        $update = Product::find($product_id)->update([
            'product_name' => $this->nm_product,
            'price'        => $this->price_product,
            'description'  => $this->desc_product
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }
    public function delete($id)
    {
        // Product::find($id)->delete();
        return back()->with('success', 'Berhasil dihapus');
    }
}

// if ($this->search) {
//     $data = Siswa::where(function ($query) {
//         $query->where('nama', 'like', "%$th  is->search%")
//             ->orWhere('nip', 'like', "%$this->search%")
//             ->orWhere('alamat', 'like', "%$this->search%");
//     })->orderBy('id', 'desc')->paginate($this->paging);
// } else {
//     $data = Siswa::orderBy('id', 'desc')->paginate($this->paging);
// }
// return view('livewire.siswa.index', compact('data'))
//     ->layout('layout');
