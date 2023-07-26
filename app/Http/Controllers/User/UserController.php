<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Tables\Appointments;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Session;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class UserController extends Controller
{
    public function index() {
        $db = Appointment::where('patient_id',Auth::user()->id)->get();
        $appDoc = [];
        $appDate = [];
        foreach ($db as $appointment) {
            $appDoc[] = $appointment->doctor_id;
            $appDate[] = $appointment->date;
        }
        return view('dashboard.user.home', [
            'user'=>Auth::user(),
            'doctor'=>$appDoc,
            'date'=>$appDate,
        ]);
    }
    public function create(Request $req) {
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'age'=>'required',
            'gender'=>'required',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->age = $req->age;
        $user->image = '';
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
                'phone' => 'numeric',
                'passport' => 'integer',
                'height' => 'integer',
                'weight' => 'integer',
            ]
        );

        $user = User::find(Auth::user()->id);
        $user->gender = $req->gender;
        $user->phone = $req->phone;
        $user->passport = $req->passport;
        $user->height = $req->height;
        $user->weight = $req->weight;
        $user->blood = $req->blood;
        $user->disease = $req->disease;
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
    public function timeChecker() {
        return view('dashboard.user.manage.appointments.time',
        [
            'doctors_names' => Session::get('names'),
        ]
        );
    }
    public function specialty() {
        $specialties = [
            'surgery',
            'Family medicine'
        ];
        return view('dashboard.user.manage.appointments.specialty', [
            'specialties'=> $specialties,
        ]);
    }
    public function book() {
        return view('dashboard.user.manage.appointments.book');
    }
    public function getTime(Request $req) {
        $doc = Doctor::find($req->doctor);
        session()->put('doc',$doc);
        session()->save();
        return redirect()->route('user.manage.appointments.book');
    }
    public function getSpec(Request $req) {
        $specialty = $req->specialty;
        $doctors = Doctor::where(Str::lower('specialty'),$specialty)->get();
        $names= [];
        foreach ($doctors as $doctor) {
            $names[] = [
                'value' => $doctor->id,
                'label' => $doctor->name,
            ];
        }
        session()->put('names',$names);
        session()->save();
        return redirect()->route('user.manage.appointments.timeChecker');
    }
    public function createAppointment(Request $req) {
        $formField = $req->validate([
            'date' => 'required',
        ]);
        $appointment = new Appointment();
        $appointment->fill($formField);
        $appointment->patient_id = Auth::user()->id;
        $appointment->doctor_id = Session::get('doc')->id;
        $appointment->status = 'on_progress';
        $appointment->save();
        Toast::title('Appointment Booked Successfuly!')
        ->autoDismiss(5);
        return redirect()->route('user.manage.appointments.index');
    }
    public function delete(Request $req) {
        Appointment::destroy($req->id);
        Toast::info('Appointment Has Been Canceled!')
        ->autoDismiss(5);
        return redirect()->back();
    }
}
