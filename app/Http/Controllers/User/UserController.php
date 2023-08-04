<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
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
    public function file() {
        $insurance = [
            'abo_ali_staff',
            'al_ahly_bank',
            'al_ahly_club',
            'axa_insurance',
            'commercial_cendicate',
            'engineering_cendicate',
            'medical_cenicate',
            'pharmacy_cendicate',
            'journalist_cendicate',
            'enaya_insurance',
            'egycare',
            'globe_med',
            'honor_card',
            'hyper_one',
            'mustakbal_watan_party',
            'nextcare',
            'smart',
            'ubf',
            'we',
            'zeied_sport_club',
            'walk_in',
        ];
        return view('dashboard.user.medical',[
            'insurance'=>$insurance,
        ]);
    }
    public function investigation(Request $req) {
        $imgs = array();
        if($files = $req->file('investigations')) {
            foreach ($files as $file) {
                $img_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $img_fl_name = $img_name. '.' .$ext;
                $upload_path = 'storage/images/medical/investigations/users/';
                $img_url = $upload_path.$img_fl_name;
                $file->move($upload_path,$img_fl_name);
                $imgs[] = $img_url;
            }
        }
        $user = User::find(Auth::user()->id);
        $user->investigations = implode(',',$imgs);
        $user->update(['investigations' => $user->investigations]);
        Toast::title('Added Successfuly!')
        ->autoDismiss(5);
        return redirect()->back();
     }
    public function  insurance(Request $req) {
        $formField = $req->validate([
            'insurance' =>'required',
        ]);
        $card = array();
        if($files = $req->file('insurance_card')) {
            foreach ($files as $file) {
                $img_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $img_fl_name = $img_name. '.' .$ext;
                $upload_path = 'storage/images/medical/insurance/users/';
                $img_url = $upload_path.$img_fl_name;
                $file->move($upload_path,$img_fl_name);
                $card[] = $img_url;
            }
        }
        $id = array();
        if($files = $req->file('insurance_id')) {
            foreach ($files as $file) {
                $img_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $img_fl_name = $img_name. '.' .$ext;
                $upload_path = 'storage/images/medical/insurance/users/';
                $img_url = $upload_path.$img_fl_name;
                $file->move($upload_path,$img_fl_name);
                $id[] = $img_url;
            }
        }
        $user = User::find(Auth::user()->id);
        $user->insurance_card =  implode(',',$card);;
        $user->insurance_id =  implode(',',$id);;
        $user->insurance = $req->insurance;
        $user->update($formField);
        Toast::title('Added Successfuly!')
        ->autoDismiss(5);
        return redirect()->back();
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
            Toast::info('You can provide us with more info via profile page!')
            ->autoDismiss(10);
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
        $insurance = [
            'abo_ali_staff',
            'al_ahly_bank',
            'al_ahly_club',
            'axa_insurance',
            'commercial_cendicate',
            'engineering_cendicate',
            'medical_cenicate',
            'pharmacy_cendicate',
            'journalist_cendicate',
            'enaya_insurance',
            'egycare',
            'globe_med',
            'honor_card',
            'hyper_one',
            'mustakbal_watan_party',
            'nextcare',
            'smart',
            'ubf',
            'we',
            'zeied_sport_club',
            'walk_in',
        ];
        return view('dashboard.user.profile.index', [
            'user'=>Auth::user(),
            'insurances'=> $insurance,
        ]);
    }
    public function update(Request $req) {
        $formField = $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'phone' => 'nullable|numeric',
                'national_id' => 'nullable|integer',
                'height' => 'nullable|integer',
                'weight' => 'nullable|integer',
                'blood' => 'nullable',
                'gender' => 'nullable',
            ]
        );
        $user = User::find(Auth::user()->id);
        $user->gender = $req->gender;
        $user->phone = $req->phone;
        $user->national_id = $req->national_id;
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
            'family_medicine'
        ];
        return view('dashboard.user.manage.appointments.specialty', [
            'specialties'=> $specialties,
        ]);
    }
    public function book() {
        $days = explode('|',Session::get('doc')->days);
        $hours = explode('|',Session::get('doc')->hours);
        $count = count($days);
        $date = [];
        $lol = [];
        for ($i = 0; $i < $count; $i++) {
            $lol[] = Carbon::createFromFormat('l', $days[$i])->format('Y-m-d');
            $hours_array = explode(',', $hours[$i]);
            foreach ($hours_array as $hour) {
                $hour_parts = explode('_', $hour);
                $temp = explode('_', $hour_parts[0]);
                $hour_parts[0] = end($temp);
                $hour_parts = array_filter($hour_parts, function($value) { return!is_string($value) ||!str_contains($value, 'day'); });
                foreach ($hour_parts as $part) {
                    if (!isset($date[$lol[count($lol) - 1]])) {
                        $date[$lol[count($lol) - 1]] = [];
                    }
                    if (!in_array($part, $date[$lol[count($lol) - 1]])) {
                        $date[$lol[count($lol) - 1]][] = $part;
                    }
                }
            }
        }
        $carbon = new Carbon();
        return view('dashboard.user.manage.appointments.book',compact('date','carbon'));
    }
    public function getTime(Request $req) {
        $req->validate([
            'doctor' => 'required',
        ]);
        $doc = Doctor::find($req->doctor);
        session()->put('doc',$doc);
        session()->save();
        return redirect()->route('user.manage.appointments.book');
    }
    public function getSpec(Request $req) {
        $req->validate([
            'specialty' => 'required',
        ]);
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
        $appointment->patient = Auth::user()->name;
        $appointment->doctor_id = Session::get('doc')->id;
        $appointment->doctor = Session::get('doc')->name;
        $appointment->status = 'not_seen';
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
