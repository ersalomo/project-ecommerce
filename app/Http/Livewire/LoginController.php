<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\support\Facades\Auth;
use App\Models\User;
use App\Models\LogUser;

class LoginController extends Component
{
    public $login_id, $password;
    function loginHandler()
    {
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            $this->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:8'
            ], [
                'login_id.required' => 'Enter your email or username correctly',
                'login_id.email' => 'Invalid email address',
                'login_id.exists' => 'This email is not registered',
                'password.required' => 'Enter your password'
            ]);
        } else {
            $this->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:8'
            ], [
                'login_id.required' => 'Enter your username',
                'login_id.username' => 'Invalid username',
                'login_id.exists' => 'This username is not registered',
                'password.required' => 'Enter your password'
            ]);
        }
        $user = array($fieldType => $this->login_id, 'password' => $this->password);

        if (Auth::attempt($user)) {
            $checkUser = User::where($fieldType, $this->login_id)->first();
            if ($checkUser->type == 0) {
                $this->showToastr('Login Succesfully', 'success');
                $message = $checkUser->name . ' login sucessfully ';
                LogUser::setMessageLog($message);
                return redirect()->route('home-page');
            } else {
                $this->showToastr('Login Succesfully', 'danger');
                session()->flash('failed', 'Invalid username,email or password');
            }
        } else {
            session()->flash('failed', 'Invalid username,email or password');
        }
    }
    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
    public function render()
    {
        return view('livewire.login-controller');
    }

    // function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/');
    // }
    // $this->email = request()->email;
    //     $this->token = request()->token;
}
