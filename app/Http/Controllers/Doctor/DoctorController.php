<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Tables\Appointments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    public function time() {
        return Doctor::all();
    }
    public function register() {
        $specialties = [
            'family_medicine',
            'general_surgery',
            'vascular_surgery',
            'pediatric_surgery',
            'neuro_surgery',
            'cardio-thoracic_surgery',
            'orthopedic_surgery',
            'plastic_surgery',
            'maxill-fascial_surgery',
            'onco-surgery',
            'urology',
            'nephrology',
            'medicine',
            'gastroentrology',
            'ent',
            'ophalmology',
            'ob_&_gy',
            'endocrinology',
            'neurology',
            'pediatrics',
            'psychiatry',
            'dermatology',
            'physio-therapy',
            'oncology',
            'immunology_&_rheummatology',
            'cardiology',
            'geriatrics',
            'hematology',
            'pain_management',
            'pulonology',
        ];
        $hours = [
            '8-9',
            '9-10',
            '10-11',
            '11-12',
            '12-13',
            '13-14',
            '14-15',
            '15-16',
            '16-17',
            '17-18',
            '18-19',
            '19-20',
            '20-21',
            '21-22',
            '22-23',
            '23-00',
        ];
        $hour_label = "Time Range";
        return view('dashboard.doctor.auth.register', compact('specialties','hours', 'hour_label'));
    }
    public function create(Request $req) {
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:doctors,email',
            'phone'=>'required|numeric|unique:doctors,phone',
            'specialty'=>'required',
            'day' => 'required',
            'gender' => 'required',
            'password'=>'required|max:30',
            'cpassword'=>'required|max:30|same:password',
        ]);
        if($req->sun_hour != null) {
            $sun_hour = 'sunday_'.implode(',',$req->sun_hour);
        }else {
            $sun_hour = null;
        }
        if($req->mon_hour != null) {
            $mon_hour = 'monday_'.implode(',',$req->mon_hour);
        }else {
            $mon_hour = null;
        }
        if($req->tue_hour != null) {
            $tue_hour = 'tuesday_'.implode(',',$req->tue_hour);
        }else {
            $tue_hour = null;
        }
        if($req->wed_hour != null) {
            $wed_hour = 'wednesday_'.implode(',',$req->wed_hour);
        }else {
            $wed_hour = null;
        }
        if($req->thu_hour != null) {
            $thu_hour = 'wednesday_'.implode(',',$req->thu_hour);
        }else {
            $thu_hour = null;
        }
        if($req->fri_hour != null) {
            $fri_hour = 'friday_'.implode(',',$req->fri_hour);
        }else {
            $fri_hour = null;
        }
        if($req->sat_hour != null) {
            $sat_hour = 'saturday_'.implode(',',$req->sat_hour);
        }else {
            $sat_hour = null;
        }
        $hour = [
            $sun_hour,
            $mon_hour,
            $tue_hour,
            $wed_hour,
            $thu_hour,
            $fri_hour,
            $sat_hour,
        ];
        $hours = [];
        foreach ($hour as $day) {
            if ($day != null) {
                $hours[] = $day;
            }
        }
        $hours = implode('|', $hours);
        $doctor = new Doctor();
        $doctor->name = $req->name;
        $doctor->email = $req->email;
        $doctor->gender = $req->gender;
        $doctor->specialty = $req->specialty;
        $doctor->days = implode('|',$req->day);
        $doctor->hours = $hours;
        $doctor->phone = $req->phone;
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
    public function profile() {
        $specialties = [
            'family_medicine',
            'general_surgery',
            'vascular_surgery',
            'pediatric_surgery',
            'neuro_surgery',
            'cardio-thoracic_surgery',
            'orthopedic_surgery',
            'plastic_surgery',
            'maxill-fascial_surgery',
            'onco-surgery',
            'urology',
            'nephrology',
            'medicine',
            'gastroentrology',
            'ent',
            'ophalmology',
            'ob_&_gy',
            'endocrinology',
            'neurology',
            'pediatrics',
            'psychiatry',
            'dermatology',
            'physio-therapy',
            'oncology',
            'immunology_&_rheummatology',
            'cardiology',
            'geriatrics',
            'hematology',
            'pain_management',
            'pulonology',
        ];
        $freeHours = [
            '8-9',
            '9-10',
            '10-11',
            '11-12',
            '12-13',
            '13-14',
            '14-15',
            '15-16',
            '16-17',
            '17-18',
            '18-19',
            '19-20',
            '20-21',
            '21-22',
            '22-23',
            '23-00',
        ];
        $days = explode('|',Auth::user()->days);
        $hours = explode('|',Auth::user()->hours);
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
        $doctor = Auth::user();
        $carbon = new Carbon();
        return view('dashboard.doctor.profile.index',compact('doctor','freeHours','date','carbon','specialties'));
    }
    public function update(Request $req) {
        $formField = $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:doctors,email',
                'phone' => 'required|numeric',
                'gender' => 'required',
                'specialty' => 'required',
                'day' => 'required',
                'password' => 'required',
            ]
        );
        if($req->sun_hour != null) {
            $sun_hour = 'sunday_'.implode(',',$req->sun_hour);
        }else {
            $sun_hour = null;
        }
        if($req->mon_hour != null) {
            $mon_hour = 'monday_'.implode(',',$req->mon_hour);
        }else {
            $mon_hour = null;
        }
        if($req->tue_hour != null) {
            $tue_hour = 'tuesday_'.implode(',',$req->tue_hour);
        }else {
            $tue_hour = null;
        }
        if($req->wed_hour != null) {
            $wed_hour = 'wednesday_'.implode(',',$req->wed_hour);
        }else {
            $wed_hour = null;
        }
        if($req->thu_hour != null) {
            $thu_hour = 'wednesday_'.implode(',',$req->thu_hour);
        }else {
            $thu_hour = null;
        }
        if($req->fri_hour != null) {
            $fri_hour = 'friday_'.implode(',',$req->fri_hour);
        }else {
            $fri_hour = null;
        }
        if($req->sat_hour != null) {
            $sat_hour = 'saturday_'.implode(',',$req->sat_hour);
        }else {
            $sat_hour = null;
        }
        $hour = [
            $sun_hour,
            $mon_hour,
            $tue_hour,
            $wed_hour,
            $thu_hour,
            $fri_hour,
            $sat_hour,
        ];
        $hours = [];
        foreach ($hour as $day) {
            if ($day != null) {
                $hours[] = $day;
            }
        }
        $hours = implode('|', $hours);
        $doctor = Doctor::find(Auth::user()->id);
        $doctor->days = implode('|',$req->day);
        $doctor->hours = $hours;
        $doctor->gender = $req->gender;
        $doctor->phone = $req->phone;
        $doctor->name = $req->name;
        $doctor->email = $req->email;
        $doctor->specialty = $req->specialty;
        $doctor->password = $req->password;
        if($req->file('image')) {
            $doctor->image =  $req->file('image')->store('images/profiles/users','public');
        }
        $doctor->update($formField);
        Toast::title('Profile Updated Successfuly!')
        ->autoDismiss(5);
        return redirect()->back();
    }
    public function appointments() {
        return view('dashboard.doctor.manage.appointments.index',
        [
            'appointments' => Appointments::class,
        ]);
    }
    public function info(Request $req) {
        $patient = User::find($req->patient_id);
        $app_id = [
            'app_id' => $req->app_id
        ];
        $lab = [
            'lol',
            'lmao'
        ];
        $rad = [
            'lol',
            'lmao'
        ];
        $med = [
            'lol',
            'lmao'
        ];
        return view('dashboard.doctor.manage.appointments.info', compact('patient','app_id','lab','rad','med'));
    }
    public function saveInfo(Request $req) {
        $formField = $req->validate([
            'history' => 'required',
            'diagnosis' => 'required',
            'laboratory' => 'required',
            'radiology' => 'required',
            'medicine' => 'required',
        ]);
        $laboratory = implode(',',$req->laboratory);
        $radiology = implode(',',$req->radiology);
        $medicine = implode(',',$req->medicine);
        $appointment = Appointment::find($req->app_id);
        $appointment->history = $req->history;
        $appointment->diagnosis = $req->diagnosis;
        $appointment->laboratory = $laboratory;
        $appointment->radiology = $radiology;
        $appointment->medicine = $medicine;
        $appointment->status = 'seen';
        $appointment->update($formField);
        Session::put('appointment', $appointment);
        Toast::title('Info Savd Successfuly!')
        ->autoDismiss(5);
        return redirect()->route('doctor.manage.appointments.prescription');
    }
    public function prescription() {
        return view('dashboard.doctor.manage.appointments.prescription');
    }
    public function cancle(Request $req) {
        Appointment::destroy($req->id);
        Toast::info('Appointment Has Been Canceled!')
        ->autoDismiss(5);
        return redirect()->back();
    }
}
