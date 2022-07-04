<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class UserProfile extends Component
{
    public $user;
    // $nameUser, $emailUser, $usernameUser, $passwordUser, $addressUser, $pictureUser;
    protected $listeners = [
        "UpdaProfileUser" => '$refresh'
    ];
    public function mount()
    {
        $this->user = User::find(auth('web')->id());
        $this->nameUser = $this->user->name;
        $this->emailUser = $this->user->email;
        $this->usernameUser = $this->user->username;
        $this->passwordUser = $this->user->password;
        $this->addressUser = $this->user->address;
        $this->pictureUser = $this->user->picture;
    }
    public function uploadProfile(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4',
            'emailUser' => 'required|email',
            'usernameUser' => 'required|min:8|max:9|exists:users,username',
            'passwordUser' => 'required|min:8|max:20',
            'addressUser' => 'required|min:5',
        ], [
            'nameUser.required' => 'Masukkan Nama yang benar',
            'nameUser.min' => 'Fullname minimal 4 karakter',
            'emailUser.required' => 'Masukkan email yang valid',
            'emailUser.email' => 'Masukkan email yang valid',
            'usernameUser.required' => 'Masukkan Username',
            'usernameUser.min' => 'Username minimal 8 karakter',
            'usernameUser.max' => 'Username maximal 9 karakter',
            'usernameUser.exists' => 'Username telah digunakan',
            'passwordUser.required' => 'Masukkan Password',
            'passwordUser.min' => 'Password minimal 8 karakter',
            'passwordUser.max' => 'Password maximal 20 karakter',
            'addressUser.required' => 'Masukkan Alamat yang benar',
            'addressUser.min' => 'Alamat minimal 5 karakter',
        ]);

        $user = User::find(auth('web')->id())->update([
            'name'     => request()->nameUser,
            'email'    => request()->emailUser,
            'password' => request()->passwordUser,
            'username' => request()->usernameUser,
            'address' => request()->addressUser,
        ]);
        if ($user) {
            dd('saf');
        }
    }

    public function render()
    {

        return view('livewire.user.user-profile', [
            'user' => $this->user
        ]);
    }
    private static function clearData()
    {
        return [];
    }
}
