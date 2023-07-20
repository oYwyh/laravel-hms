<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class AdminController extends Controller
{
    public function check(Request $req) {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $creds = $req->only('email','password');
        if(Auth::guard('admin')->attempt($creds)) {
            Toast::title('Logged In Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('admin.home');
        }else {
            Toast::danger('Invallid Credintiols :(')
            ->autoDismiss(5);
            return redirect()->route('admin.login');
        }
    }
    public function logout(Request $req) {
        Auth::guard('admin')->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        Toast::title('Logout Successfuly :)')
        ->autoDismiss(5);
        return redirect()->back();
    }
    public function admins() {
        return view('dashboard.admin.admins');
    }
    public function home() {
        $users = DB::table('users')->get();
        $admins = DB::table('admins')->get();
        $doctors = DB::table('doctors')->get();
        return view('dashboard.admin.home',[
            'users'=>$users,
            'admins'=>$admins,
            'doctors'=>$doctors,
        ]);
    }
}
