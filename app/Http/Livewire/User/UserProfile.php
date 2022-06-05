<?php

namespace App\Http\Livewire\User;

use App\Models\User;

use Livewire\Component;

class UserProfile extends Component
{
    public $user, $nameUser, $emailUser, $usernameUser, $passwordUser, $addresUser, $pictureUser;
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

    public function render()
    {

        return view('livewire.user.user-profile');
    }
}
