<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProdcutController extends Controller
{
    function changeProfilePicture(Request $request)
    {
        $user = Product::find(auth("web")->id());
        $path = "back/dist/img/productImages/";
        $file = $request->file('file');
        $oldPicture = $user->getAttributes()['image'];
        $filePath = $path . $oldPicture;
        $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 10000) . ".jpg";

        if ($oldPicture != null && File::exists(public_path($filePath))) {
            File::delete(public_path($filePath));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->update([
                "picture" => $new_picture_name
            ]);
            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been successfully updated.']);
        } else {
            return response()->json(['status' => 0, 'Something went wrong']);
        }
    }
}
