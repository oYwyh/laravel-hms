<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;

class DoctorController extends Controller
{
    public function create(Request $req) {
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:doctors,email',
            'hospital'=>'required',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $doctor = new Doctor();
        $doctor->name = $req->name;
        $doctor->email = $req->email;
        $doctor->hospital = $req->hospital;
        $doctor->password = Hash::make($req->password);
        $save = $doctor->save();

        if($save) {
            Toast::title('Doctor Registered Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('doctor.login');
        }else {
            Toast::danger('Doctor Registered Failed!')
            ->autoDismiss(5);
            return redirect()->route('doctor.register');
        }
    }
    public function check(Request $req) {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
            ]);
        $creds = $req->only('email','password');
        if(Auth::guard('doctor')->attempt($creds)) {
            Toast::title('Logged In Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('doctor.home');
        }else {
            Toast::danger('Invallid Credintiols :(')
            ->autoDismiss(5);
            return redirect()->route('doctor.login');
        }
    }
    public function logout(Request $req) {
        Auth::guard('doctor')->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        Toast::title('Logout Successfuly :)')
        ->autoDismiss(5);
        return redirect()->route('doctor.login');
    }
}
