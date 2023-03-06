<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailSettingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SystemSettingController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'login');

/** User Routes start */
Route::get('user/profile',[UserController::class, 'profile'])->name('user.profile');
Route::get('user/update',[UserController::class, 'update'])->name('user.update');
Route::get('user/password',[UserController::class, 'password'])->name('user.password');
Route::post('user/avatar',[UserController::class, 'avatar'])->name('user.avatar');
/** User Routes end */

Route::get('dashboard',[DashboardController::class,'index']);

//Route for events start here
Route::get('events',[EventController::class, 'index']);
Route::post('event/store',[EventController::class, 'store'])->name('event.store');
Route::get('event/edit',[EventController::class, 'edit'])->name('event.edit');
Route::patch('event/{id}/update',[EventController::class, 'update'])->name('event.update');
Route::post('event/delete/{id}',[EventController::class, 'destroy'])->name('event.delete');
//Route for events end here

//Route for task start here
Route::get('tasks',[TaskController::class, 'index']);
Route::post('task/store',[TaskController::class, 'store'])->name('task.store');
Route::get('task/edit',[TaskController::class, 'edit'])->name('task.edit');
Route::patch('task/{id}/update',[TaskController::class, 'update'])->name('task.update');
Route::post('task/delete/{id}',[TaskController::class, 'destroy'])->name('task.delete');
Route::post('task/done',[TaskController::class,'done'])->name('task.done');
//Route for task end here

//Route for reminder start here
Route::get('reminders',[ReminderController::class, 'index']);
Route::post('reminder/store',[ReminderController::class, 'store'])->name('reminder.store');
Route::get('reminder/edit',[ReminderController::class, 'edit'])->name('reminder.edit');
Route::patch('reminder/{id}/update',[ReminderController::class, 'update'])->name('reminder.update');
Route::post('reminder/delete/{id}',[ReminderController::class, 'destroy'])->name('reminder.delete');
Route::post('reminder/done',[ReminderController::class,'done'])->name('reminder.done');
//Route for reminder end here

// Ajax routes
Route::post('calender-add',[DashboardController::class,'create'])->name('calendar-add');
Route::post('calender-event',[DashboardController::class,'edit'])->name('calendar-event');

//route for email setting starts here
Route::get('setting/email',[EmailSettingController::class, 'index'])->name('setting.email');
Route::post('setting/email/store',[EmailSettingController::class, 'store'])->name('email.store');
Route::post('setting/email/edit',[EmailSettingController::class, 'edit'])->name('email.edit');
Route::post('setting/email/update',[EmailSettingController::class, 'update'])->name('email.update');
Route::delete('setting/email/delete/{id}',[EmailSettingController::class, 'destroy'])->name('email.delete');
//route for email setting ends here

//Route for Company Basic Info start here
Route::get('setting/basicInfo',[CompanyController::class, 'index'])->name('basicInfo');
Route::patch('setting/basicInfo/update',[CompanyController::class, 'update'])->name('basicInfo.update');
//Route for Company Basic Info ends here

//Route for System Setting start here
Route::get('setting/systemSetting',[SystemSettingController::class, 'index'])->name('systemSetting');
Route::patch('setting/systemSetting/update',[SystemSettingController::class, 'update'])->name('systemSetting.update');
Route::patch('setting/favicon/update',[SystemSettingController::class, 'favicon'])->name('favicon.update');
Route::patch('setting/logo/update',[SystemSettingController::class, 'logo'])->name('logo.update');
//Route for System Setting ends here
