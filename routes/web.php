<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\employmentItemsController;
use App\Http\Controllers\Admin\employmentConditionsController;
use App\Http\Controllers\Admin\examController;
use App\Http\Controllers\Admin\bannersController;
use App\Http\Controllers\Admin\aboutUsController;
use App\Http\Controllers\Admin\jobseekreController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\settingController;
use App\Http\Controllers\Admin\usersController;
use App\Http\Controllers\Admin\messagesCondtroller;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\home\employmentsController;
use App\Http\Controllers\home\ConditionsController;
use App\Http\Controllers\home\signUpExamController;
use App\Http\Controllers\home\homeaboutUsController;
use App\Http\Controllers\home\examInformationController;
use App\Http\Controllers\home\paymentController;
use App\Http\Controllers\home\userPanelController;
use App\Http\Controllers\home\homeExamController;
use App\Http\Controllers\home\contactUsController;
use App\Http\Controllers\Auth\AuthController;





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










/////authentications/////
Route::get('/google/' , [AuthController::class , 'redirectToProvider'])->name('provider.login');
Route::get('/login/google/callback' , [AuthController::class , 'ProviderCallback']);
Route::get('/logout' , function () {auth()->logout();return redirect()->route('home.index');});
Route::post('login' , [AuthController::class , 'login'])->name('login');
    Route::any('verification' , [AuthController::class , 'verification'])->name('verification');








/////adminPanel/////
Route::get('/admin_panel/management/greenHouse/webAPK/dashboard',[dashboardController::class , 'index'])->name('dashboard')->middleware('Admin_pass');
Route::prefix('/admin_panel/management/greenHouse/webAPK')->name('admin.')->middleware('Admin_pass')->group(function () {
    Route::resource('employments', employmentItemsController::class);
    Route::resource('employmentConditions', employmentConditionsController::class);
    Route::resource('exams', examController::class);
    Route::resource('banners', bannersController::class);
    Route::resource('aboutUs', aboutUsController::class);
    Route::resource('jobseekers',jobseekreController::class);
    Route::resource('settings',settingController::class);
    Route::resource('users',usersController::class);
    Route::resource('messages',messagesCondtroller::class);
    Route::resource('management',ManagementController::class);

});


Route::get('test' , function ()
{
    $user =
    auth()->loginUsingId(1);
});









/////home/////
Route::get('/' , [homeController::class , 'index'])->name('home.index');
Route::get('/employments' , [employmentsController::class , 'index'])->name('home.employments');
Route::get('/employmentConditions/{attitude:slug}/{empItem:slug}' , [ConditionsController::class , 'index'])->name('home.conditions');
Route::get('/signUpExam/{attitude:slug}/{empItem:slug}' , [signUpExamController::class , 'index'])->name('home.signUp');
Route::post('/signUpExam/store' , [signUpExamController::class , 'store'])->name('home.signUp.store');
Route::get('/signUpExam/payment' , [signUpExamController::class , 'payment'])->name('home.signUp.payment');
Route::get('/aboutUs' , [homeaboutUsController::class , 'index'])->name('home.aboutUs');
Route::get('/contactUs' , [contactUsController::class , 'index'])->name('home.contactUs');
Route::post('/contactUs/sendMessage' , [contactUsController::class , 'sendMessage'])->name('home.sendMessage');
Route::get('/examInformation' , [examInformationController::class , 'index'])->name('home.examInformation');
Route::get('/user_panel' , [userPanelController::class , 'index'])->name('user_panel');
Route::post('/user_panel' , [userPanelController::class , 'update'])->name('user_panel.update');
Route::get('/exam' , [homeExamController::class , 'checkout'])->name('home.exam');
Route::post('/exam/sendQuestion' , [homeExamController::class , 'sendQuestions'])->name('home.exam.sendQuestion');
Route::get('/successful_send',function () {return view('home.checkout.successsend');})->name('success');
Route::get('/unsuccessful_send',function () {return view('home.checkout.unsuccesssend');})->name('unsuccess');
Route::get('/timeout',function () {return view('home.checkout.timeout');})->name('timeout');









/////payments/////
Route::post('/payment' , [paymentController::class , 'payment'])->name('home.payment');
Route::get('/payment-verify' , [paymentController::class , 'paymentVerify'])->name('home.paymentVerify');




Route::get('/test' , function ()
{
    $user = User::find(1);
    auth()->login($user);
});

