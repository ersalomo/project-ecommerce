<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminLoginFrom extends Component
{
    public $login_id, $password;
    function loginAdmin()
    {

        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            $this->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required|min:8'
            ], [
                'login_id.required' => 'Enter your email or username correctly',
                'login_id.email' => 'Invalid email address',
                'login_id.exists' => 'This email is not registered',
                'password.required' => 'Enter your password'
            ]);
        } else {
            $this->validate([
                'login_id' => 'required|exists:admins,username',
                'password' => 'required|min:8'
            ], [
                'login_id.required' => 'Enter your username',
                'login_id.username' => 'Invalid username',
                'login_id.exists' => 'Admin!!, This username is not registered',
                'password.required' => 'Enter your password'
            ]);
        }
        $admin = array($fieldType => $this->login_id, 'password' => $this->password);

        if (Auth::guard('admin')->attempt($admin)) {
            $checkUser = Admin::where($fieldType, $this->login_id)->first();
            // if ($checkUser->username) {
            if ($checkUser) {
                // return redirect()->route('/home-admin');
                session()->flash('success', 'login Successfully');
                return redirect()->route('admin.home-admin');
            } else {
                session()->flash('failed', 'Invalid username,email or password');
            }
        } else {
            dd("else");
            session()->flash('failed', 'Error like you');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-login-from');
    }
}
