<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;
    // $nameUser, $emailUser, $usernameUser, $passwordUser, $addressUser, $pictureUser;
    protected $listeners = [
        "UpdaProfileUser" => '$refresh',
        // "uploadProfile" => '$refresh',
    ];
    public function mount()
    {
        $this->user = User::find(auth('web')->id());
    }

    public function render()
    {
        return view('livewire.user.user-profile', [
            'user' => $this->user
        ]);
    }
    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
}
