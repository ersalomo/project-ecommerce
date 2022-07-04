<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Category;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ListProducts extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $paginator = 10, $product_id, $nm_product, $price_product, $image_product, $desc_product, $ct_product;
    public $cat_id;
    public $gambar;

    public function mount()
    {
    }

    public function render()
    {
        if ($this->paginator <= 0) {
            session()->flash('success', 'Tidak bisa showing data bernilai 0');
            $this->paginator = 1;
        }

        $products = Product::orderBy('id', 'desc')->paginate($this->paginator);
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
    function openModalAdd()
    {
        $this->clearColumn();
        $this->dispatchBrowserEvent('openModalAdd');
    }
    function addProduct()
    {
        $this->validate([
            'nm_product' => 'required',
            'cat_id' => 'required',
            'price_product' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'desc_product' => 'required'
        ], [
            'nm_product.required' => 'Masukkan nama product',
            'cat_id.required' => 'Pilih nama category product',
            'price_product.required' => 'Masukkan harga product',
            'gambar.required' => 'Masukkan Gambar',
            'desc_product.required' => 'Masukkan description product',
        ]);
        $cek =  $this->validate()['gambar'] = $this->gambar->store('images');
        $fileName = '';
        // if ($this->image) {
        //     $fileName = $this->image->store('posts');
        // } else {
        //     $fileName = null;
        // }
        if ($cek) {
            dd($cek);
        }
        dd('no');
        $product = Product::create([
            'category_id' => $this->cat_id,
            'product_name' => $this->nm_product,
            'price' => $this->price_product,
            'image' => $fileName,
            'description' => $this->desc_product,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($product) {
            $this->clearColumn();
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            session()->flash('success', 'Berhasil menambah data product');
        } else {
            session()->flash('fail', 'Gagal menambah data product');
        }

        // if ($request->file('gambar')) {
        //     dd('asda');
        //     $fileName = time() . $product->id . $request->file('gambar')->getClientOriginalName();
        //     $request->file('gambar')->move(public_path('image/products/'), $fileName);
        //     Product::find($product->id)->update([
        //         'image' => $fileName,
        //     ]);
        // }

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
    private function clearColumn()
    {
        $this->cat_id = '';
        $this->nm_product = '';
        $this->price_product = '';
        $this->image_product = '';
        $this->desc_product = '';
    }
    public function delete($id)
    {
        Product::find($id)->delete();
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
