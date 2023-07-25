<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Doctor;
use App\Tables\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

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
    public function profile() {
        return view('dashboard.user.profile.index', [
            'user'=>Auth::user(),
        ]);
    }
    public function update(Request $req) {
        $formField = $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );

        $user = User::find(Auth::user()->id);
        if($req->file('image')) {
            $user->image =  $req->file('image')->store('images/profiles/users','public');
        }
        $user->update($formField);
        Toast::title('Profile Updated Successfuly!')
        ->autoDismiss(5);
        return redirect()->back();
    }
    public function appointments() {
        return view('dashboard.user.manage.appointments.index',
        [
            'appointments' => Appointments::class,
        ]);
    }
    public function book() {
        $doctors = Doctor::all();
        $doctors_names = [];
        $doctors_ids = [];
        foreach ($doctors as $doctor) {
            $doctors_names[] = $doctor->name;
            $doctors_ids[] = $doctor->id;
        }
        return view('dashboard.user.manage.appointments.book',
        [
            'doctors_names' => $doctors_names,
            'doctors_ids' => $doctors_ids
        ]
    );
    }
    public function createAppointment(Request $req) {
        $formField = $req->validate([
            'doctor' => 'required',
            'date' => 'required',
        ]);

    }
    public function edit() {

    }
    public function delete() {

    }
}
