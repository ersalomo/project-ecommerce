<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class IndexUser extends Component
{
    public function render()
    {

        return view('livewire.user.index-user', [
            'users' => User::orderBy('name', 'asc')->get(),
        ]);
    }
}
