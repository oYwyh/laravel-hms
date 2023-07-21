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
        // $data = DB::table('users')->select('id','created_at')->get()->groupBy(function($data) {
        //     return Carbon::parse($data->created_at)->format('M');
        // });
        // $months=[];
        // $monthCount=[];
        // foreach ($data as $month => $items) {
        //     $months[]=$month;
        //     $monthCount[]=count($items);
        // }
        return view('dashboard.admin.home',[
            'users'=>$users,
            'admins'=>$admins,
            'doctors'=>$doctors,
            // 'chart'=>$data,
            // 'months'=>$months,
            // 'monthCount'=>$monthCount,
        ]);
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
}
