<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Livewire\User\UserProfile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function changeImage(Request $request)
    {
        $user = User::find(auth("web")->id());
        // $path = "back/dist/img/authors/";
        $path = "image/users/";
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

    public function uploadProfile(Request $request, UserProfile $userProfile)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'username' => 'required|max:8|max:9|exists:users,username',
            'address' => 'required|min:5',
        ], [
            'name.required' => 'Masukkan Nama yang benar',
            'name.min' => 'Fullname minimal 4 karakter',
            'email.required' => 'Masukkan email yang valid',
            'email.email' => 'Masukkan email yang valid',
            'username.min' => 'Username minimal 8 karakter',
            'username.max' => 'Username maximal 9 karakter',
            'username.exists' => 'Username telah digunakan',
            'address.required' => 'Masukkan Alamat yang benar',
            'address.min' => 'Alamat minimal 5 karakter',
        ]);
        $user = User::find(auth('web')->id())->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'address' => $request->address,
        ]);
        dd($user);
        // if ($user) {
        //     $userProfile->showToastr('Updated Successfully', 'success');
        //     return back()->with('success', 'Updated Successfully');
        // }
    }
}
