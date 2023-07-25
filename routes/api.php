<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/chart', function (Request $request) {
    $users = DB::table('users')->get();
    $admins = DB::table('admins')->get();
    $doctors = DB::table('doctors')->get();
    $datas = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("day_name"))
                ->orderBy('created_at')
                ->pluck('count', 'day_name');

    $labels = $datas->keys()->toArray();
    $data = $datas->values()->toArray();
    return compact('labels', 'data');
});
