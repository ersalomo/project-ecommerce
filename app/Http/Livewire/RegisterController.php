<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Component
{
    public $fullName, $email, $username, $password, $address, $repeated_password;
    // $picture,$type
    public function render()
    {
        return view('livewire.register-controller');
    }

    function registerHandler(Request $request)
    {
        $this->validate(
            [
                'fullName' => 'required|min:4|max:16',
                'email' => 'required|email',
                'username' => 'required|min:8|max:9',
                // 'username' => 'required|min:8|exists:users,username',
                'password' => 'required|min:8|max:20',
                'repeated_password' => 'same:password|min:8',
                'address' => 'required|min:5',

            ],
            [
                'fullName.required' => 'Enter your valid name',
                'fullName.min' => 'Fullname must be at least 4 characters',
                'fullName.max' => 'Fullname must be less than 16 characters',
                'email.required' => 'Enter a valid email address',
                // 'email.exists' => 'Email not valid',
                'username.required' => 'Enter your username',
                'username.min' => 'Username must be at least 8 characters',
                'username.max' => 'Username max 9 characters',
                // 'username.exists' => 'The username already exists',
                'address.required' => 'Enter a valid address',
                'password.required' => 'Enter your password',
                'password.min' => 'Password must be at least 8 characters',
                'password.max' => 'Password cannot more than 20 characters',
                'repeated_password.same' => 'Must match with password',
                'repeated_password.min' => 'Fill this form password'

            ]
        );

        User::create([
            'name' => $this->fullName,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'address' => $this->address,
        ]);

        $this->clearText();
        return redirect(route('login'));
    }
    private function clearText()
    {
        return [
            $this->fullName = '',
            $this->email = '',
            $this->username = '',
            $this->password = '',
            $this->address = '',
            $this->repeated_password = ''
        ];
    }
}
