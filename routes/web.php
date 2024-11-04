<?php

use App\Http\Controllers\Admin\PayslipDetailSettingController;
use App\Http\Controllers\Admin\PayslipHEADSettingController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login/sms/send', [LoginController::class, 'sendSms'])->name('login.send');
Route::get('login/sms', [LoginController::class, 'smsForm'])->name('login.smsForm');
Route::post('/login', [LoginController::class, 'login'])->name('logincreate');
Route::post('/login-password', [LoginController::class, 'loginPassword'])->name('login.password');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



Route::get('form', [FormController::class, 'form'])->name('form.import')->middleware('admin');
Route::post('import', [FormController::class, 'import'])->name('file.import')->middleware('admin');
Route::get('/fish/user' , [FormController::class, 'showUser'])->name('user.fish.show')->middleware('auth');
Route::get('/fish/admin' , [FormController::class, 'index'])->name('admin.fish.show')->middleware('admin');
Route::get('/fish/print/{form}' , [FormController::class, 'print'])->name('fish.print')->middleware('admin');
Route::get('/fish/show/{form}' , [FormController::class, 'show'])->name('fish.show')->middleware('auth');
Route::get('/' , [FormController::class, 'latestForm'])->name('fish.first')->middleware('auth');
Route::delete('form/destroy/{form}' , [FormController::class, 'destroy'])->name('form.destroy')->middleware('auth');

Route::prefix('user/')->name('user.')->middleware('admin')->group(function () {
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('delete');
    Route::post('import', [UserController::class, 'import'])->name('import')->middleware('admin');
    Route::get('fish/{user}', [UserController::class, 'fish'])->name('fish')->withoutMiddleware('admin')->middleware('auth');

});


Route::prefix('settings')->name('settings.')->middleware('admin')->group(function () {
    Route::get('index', [SettingController::class, 'index'])->name('index');
    Route::post('save', [SettingController::class, 'save'])->name('save');

    Route::prefix('payslip')->name('payslip.')->group(function () {
        Route::get('/index', [PayslipHeadSettingController::class, 'index'])->name('index');
        Route::post('/store', [PayslipHeadSettingController::class, 'store'])->name('store');
        Route::get('/edit/{payslipHeadSetting}', [PayslipHeadSettingController::class, 'edit'])->name('edit');
        Route::post('/update/{payslipHeadSetting}', [PayslipHeadSettingController::class, 'update'])->name('update');


        Route::prefix('{payslipHeadSetting}/detail')->name('detail.')->group(function () {
            Route::get('index', [PayslipDetailSettingController::class, 'index'])->name('index');
            Route::post('store', [PayslipDetailSettingController::class, 'store'])->name('store');
            Route::get('/edit/{payslipSetting}', [PayslipDetailSettingController::class, 'edit'])->name('edit');
            Route::post('/update/{payslipSetting}', [PayslipDetailSettingController::class, 'update'])->name('update');
        });
    });
});

