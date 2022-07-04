<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function changeImage(Request $request)
    {
        $user = User::find(auth("web")->id());
        // $path = "back/dist/img/authors/";
        $path = "image/products/";
        $file = $request->file('file');
        $oldPicture = $user->getAttributes()['picture'];
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
