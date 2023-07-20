<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;

class UserController extends Controller
{
    public function create(Request $req) {
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $save = $user->save();

        if($save) {
            Toast::title('User Registered Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('user.login');
        }else {
            Toast::danger('User Registered Failed!')
            ->autoDismiss(5);
            return redirect()->route('user.register');
        }
    }
    public function check(Request $req) {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
            ]);
        $creds = $req->only('email','password');
        if(Auth::guard('web')->attempt($creds)) {
            Toast::title('Logged In Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('user.home');
        }else {
            Toast::danger('Invallid Credintiols :(')
            ->autoDismiss(5);
            return redirect()->route('user.login');
        }
    }
    public function logout(Request $req) {
        Auth::guard('web')->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        Toast::title('Logout Successfuly :)')
        ->autoDismiss(5);
        return redirect()->route('user.login');
    }
}
