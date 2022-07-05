<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ProdcutController extends Controller
{

    public function addProduct(Request $request)
    {

        $request->validate([
            "category_id" => 'required',
            "product_name" => 'required',
            "price"       => 'required|numeric',
            "image"      => 'mimes:jpeg,jpg,png,gif|max:5000|nullable',
            "description" => 'required|min:10|max:250',
        ], [
            'category_id.required' => 'Pilih category',
            'product_name' => 'Masukkan nama product',
            'price.required' => 'Masukkan harga product',
            'image.mimes' => 'Hanya berupa gambar',
            'description.required' => 'Masukkan description product',
        ]);

        $product = Product::create([
            'category_id'  => $request->category_id,
            'product_name' => $request->product_name,
            'price'        => $request->price,
            'image'        => '',
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = time() . $request->file('gambar')->getClientOriginalName();
            $fileName = $gambar . '.jpg';
            $request->file('gambar')->move(public_path('image/products/'), $fileName);
            Product::find($product->id)->update([
                'image' => $fileName,
            ]);
            return redirect()->back()->with('success', 'Berhasil menambah data');
            // return response()->json(['status' => 1, 'msg' => 'Your profile picture has been successfully updated.']);
        } else {
            return redirect()->back()->with('fail', 'Dara product gagal ditambahkan data');
            // return response()->json(['status' => 0, 'Something went wrong']);
            // return redirect()->back();
        }
        return back();
    }
    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function changeProfilePicture(Request $request)
    {
        try {
            $id = $request->product_id;
            $request->validate([
                'gambar' => 'file|image|mimes:png,jpg,jpeg'
            ]);
            if ($request->file('gambar')) {
                $fileName = time() . $request->file('gambar')->getClientOriginalName();
                $request->file('gambar')->move(public_path('image/products/'), $fileName);
                Product::find($id)->update([
                    'image' => $fileName,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->with('success', 'Gambar berhasil ditambah');
            }
        } catch (\Exception $e) {
            return redirect()->with('fail', 'gambar tidak dapat ditambah');
        }
    }


    public function contoh(Request $request)
    {
        // dd('adada', $request->product_id);
        $product = Product::find(auth("web")->id());
        $path = "back/dist/img/productImages/";
        $file = $request->file('file');
        $oldPicture = $product->getAttributes()['image'];
        $filePath = $path . $oldPicture;
        $new_picture_name = 'Product_' . $product->id . time() . rand(1, 10000) . ".jpg";

        if ($oldPicture != null && File::exists(public_path($filePath))) {
            File::delete(public_path($filePath));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $product->update([
                "picture" => $new_picture_name
            ]);
            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been successfully updated.']);
        } else {
            return response()->json(['status' => 0, 'Something went wrong']);
        }
    }
}
