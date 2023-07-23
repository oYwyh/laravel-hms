<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Tables\Users;
use App\Models\Doctor;
use App\Tables\Admins;
use App\Tables\Doctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
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
    public function home() {
        $users = DB::table('users')->get();
        $admins = DB::table('admins')->get();
        $doctors = DB::table('doctors')->get();
        // $datas = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(DB::raw("day_name"))
        //             ->orderBy('created_at')
        //             ->pluck('count', 'day_name');

        // $labels = $datas->keys()->toArray();
        // $data = $datas->values()->toArray();
        // return view('dashboard.admin.home', compact('users','admins','doctors','labels', 'data'));
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        return view('dashboard.admin.home', compact('users','admins','doctors','chart1'));
    }
    public function adminIndex() {
        return view('dashboard.admin.manage.admins.index',[
            'admins' => Admins::class,
        ]);
    }
    public function adminEdit(Request $req) {
        return view('dashboard.admin.manage.admins.edit',[
            'id'=> $req->id,
            'admin' => Admin::find($req->id),
        ]);
    }
    public function adminUpdate(Request $req) {
        Admin::find($req->id)->update($req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required',
                'phone' => 'required',
            ]
            ));
        Toast::title('Admin Updated Successfuly!')
        ->autoDismiss(5);
        return redirect()->route('admin.manage.admins.index');
    }
    public function adminAdd(Request $req) {
        return view('dashboard.admin.manage.admins.add');
    }
    public function adminCreate(Request $req) {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email',
                'phone' => 'required',
                'password'=>'required|min:5|max:30',
                'cpassword'=>'required|min:5|max:30|same:password',
            ]
        );
        $admin = new Admin();
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->phone = $req->phone;
        $admin->password = Hash::make($req->password);
        $save = $admin->save();

        if($save) {
            Toast::title('Admin Registered Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('admin.manage.admins.index');
        }else {
            Toast::danger('Admin Registered Failed!')
            ->autoDismiss(5);
            return redirect()->route('admin.manage.admins.index');
        }
    }
    public function adminDelete(Request $req) {
        Admin::find($req->id)->delete();
        Toast::success('Admin Removed Successfuly!');
        return redirect()->back();
    }
    public function doctorIndex() {
        return view('dashboard.admin.manage.doctors.index',[
            'doctors' => Doctors::class,
        ]);
    }
    public function doctorEdit(Request $req) {
        return view('dashboard.admin.manage.doctors.edit',[
            'id'=> $req->id,
            'doctor' => Doctor::find($req->id),
        ]);
    }
    public function doctorUpdate(Request $req) {
        Doctor::find($req->id)->update($req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:doctors,email',
                'password' => 'required',
                'hospital' => 'required',
            ]
            ));
        Toast::title('Doctor Updated Successfuly!')
        ->autoDismiss(5);
        return redirect()->route('admin.manage.doctors.index');
    }
    public function doctorAdd(Request $req) {
        return view('dashboard.admin.manage.doctors.add');
    }
    public function doctorCreate(Request $req) {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:doctors,email',
                'hospital' => 'required',
                'password'=>'required|min:5|max:30',
                'cpassword'=>'required|min:5|max:30|same:password',
            ]
        );
        $doctor = new Doctor();
        $doctor->name = $req->name;
        $doctor->email = $req->email;
        $doctor->hospital = $req->hospital;
        $doctor->password = Hash::make($req->password);
        $save = $doctor->save();

        if($save) {
            Toast::title('Doctor Registered Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('admin.manage.doctors.index');
        }else {
            Toast::danger('Doctor Registered Failed!')
            ->autoDismiss(5);
            return redirect()->route('admin.manage.doctors.index');
        }
    }
    public function doctorDelete(Request $req) {
        Doctor::find($req->id)->delete();
        Toast::success('Doctor Removed Successfuly!');
        return redirect()->back();
    }
    public function userIndex() {
        return view('dashboard.admin.manage.users.index',[
            'users' => Users::class,
        ]);
    }
    public function userEdit(Request $req) {
        return view('dashboard.admin.manage.users.edit',[
            'id'=> $req->id,
            'user' => User::find($req->id),
        ]);
    }
    public function userUpdate(Request $req) {
        User::find($req->id)->update($req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]
            ));
        Toast::title('User Updated Successfuly!')
        ->autoDismiss(5);
        return redirect()->route('admin.manage.users.index');
    }
    public function userAdd(Request $req) {
        return view('dashboard.admin.manage.users.add');
    }
    public function userCreate(Request $req) {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password'=>'required|min:5|max:30',
                'cpassword'=>'required|min:5|max:30|same:password',
            ]
        );
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $save = $user->save();

        if($save) {
            Toast::title('User Registered Successfuly!')
            ->autoDismiss(5);
            return redirect()->route('admin.manage.users.index');
        }else {
            Toast::danger('User Registered Failed!')
            ->autoDismiss(5);
            return redirect()->route('admin.manage.users.index');
        }
    }
    public function userDelete(Request $req) {
        User::find($req->id)->delete();
        Toast::success('User Removed Successfuly!');
        return redirect()->back();
    }
    public function profile(Admin $admin) {
        return view('dashboard.admin.profile.index',
        [
            'admin'=>Auth::user(),
        ]
    );
    }
}
