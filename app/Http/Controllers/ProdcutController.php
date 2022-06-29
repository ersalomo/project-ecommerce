<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProdcutController extends Controller
{
    public function changeProfilePicture(Request $request)
    {
        try {
            $id = $request->product_id;
            $request->validate([
                'gambar' => 'file|image|mimes:png,jpg,jpeg'
            ]);
            if ($request->file('gambar')) {

                $fileName = time() . $request->file('gambar')->getClientOriginalName();
                $request->file('gambar')->move(public_path('image/products'), $fileName);
                $product = Product::find($id)->update([
                    'image' => $fileName,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->with('success', 'Gambar berhasil diupdate');
            }
            dd('dsno if');
            // else {
            // }
        } catch (\Exception $e) {
            return back()->with('fail', 'gambar tidak dapat diupdate');
            // return response()->json([
            //     'error' => 404,
            //     'message' => $e->getMessage(),
            // ]);
        }
    }

    //   public function changeProfilePicture(Request $request)
    //     {
    //         // dd('adada', $request->product_id);
    //         $product = Product::find(auth("web")->id());
    //         $path = "back/dist/img/productImages/";
    //         $file = $request->file('file');
    //         $oldPicture = $product->getAttributes()['image'];
    //         $filePath = $path . $oldPicture;
    //         $new_picture_name = 'Product_' . $product->id . time() . rand(1, 10000) . ".jpg";

    //         if ($oldPicture != null && File::exists(public_path($filePath))) {
    //             File::delete(public_path($filePath));
    //         }
    //         $upload = $file->move(public_path($path), $new_picture_name);
    //         if ($upload) {
    //             $product->update([
    //                 "picture" => $new_picture_name
    //             ]);
    //             return response()->json(['status' => 1, 'msg' => 'Your profile picture has been successfully updated.']);
    //         } else {
    //             return response()->json(['status' => 0, 'Something went wrong']);
    //         }
    //     }
}
