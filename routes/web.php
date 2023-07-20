<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Doctor\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['splade'])->group(function () {
    Route::get('/welcome', fn () => view('home'))->name('home');
    Route::get('/docs', fn () => view('docs'))->name('docs');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
    Route::prefix('user')->name('user.')->group(function(){
        Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
                Route::view('/login','dashboard.user.login')->name('login');
                Route::view('/register','dashboard.user.register')->name('register');
                Route::post('/create',[UserController::class,'create'])->name('create');
                Route::post('/check',[UserController::class,'check'])->name('check');
        });

        Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
                Route::view('/home','dashboard.user.home')->name('home');
                Route::post('/logout',[UserController::class,'logout'])->name('logout');
                // Route::get('/add-new',[UserController::class,'add'])->name('add');
        });
    });

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.admin.login')->name('login');
            Route::post('/check',[AdminController::class,'check'])->name('check');
        });
        Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
            Route::get('/home',[AdminController::class,'home'])->name('home');
            Route::post('/logout',[AdminController::class,'logout'])->name('logout');
            Route::get('/admins',[AdminController::class,'admins'])->name('admins');
            Route::get('/doctors',[AdminController::class,'doctors'])->name('doctors');
            Route::get('/patients',[AdminController::class,'patients'])->name('patients');
            // Route::post('/profile',[AdminController::class,'profile'])->name('logout');
        });
    });

    Route::prefix('doctor')->name('doctor.')->group(function(){
        Route::middleware(['guest:doctor','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.doctor.login')->name('login');
            Route::view('/register','dashboard.doctor.register')->name('register');
            Route::post('/create',[DoctorController::class,'create'])->name('create');
            Route::post('/check',[DoctorController::class,'check'])->name('check');
        });
        Route::middleware(['auth:doctor','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.doctor.home')->name('home');
            Route::post('logout',[DoctorController::class,'logout'])->name('logout');
        });
    });
});
