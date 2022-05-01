<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersControllers;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\LeaveController;
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

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard', [DashboardControllers::class, 'index']);
    Route::get('/change/password', [DashboardControllers::class, 'changePassword']);
    Route::get('/view_report/{id}' , [LeaveController::class , 'viewReport'])->name('view.report');
});

Route::group(['middleware'=>['auth', 'user']],function(){

    /********* employee EndPoints *********/
    Route::get('/leaves_listing', [LeaveController::class, 'index'])->name('leaves.index');
    Route::get('/create_leave', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('/add_leave', [LeaveController::class, 'store'])->name('leaves.store');
    /********* End -- employee EndPoints -- *********/
    
});

Route::group(['middleware'=>['auth', 'HR']],function(){

    /********* HR EndPoints *********/
    Route::get('/users_listing', [UsersControllers::class, 'index'])->name('users.index');
    Route::get('/leaves_list', [LeaveController::class, 'leaveListing'])->name('hr.leave_request');
    Route::post('/decline_leave_request', [LeaveController::class, 'declineLeaveByHR'])->name('hr.decline_leave_request');
    Route::post('/accept_leave_request', [LeaveController::class, 'acceptLeaveByHR']);
    /********* End -- HR EndPoints -- *********/
    
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('message', 'You are successfully logout');;
});

require __DIR__.'/auth.php';
