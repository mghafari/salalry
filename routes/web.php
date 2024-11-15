<?php

use App\Http\Controllers\Admin\AdminGuaranteeFormListController;
use App\Http\Controllers\Admin\GuaranteeFormListController;
use App\Http\Controllers\Admin\PayslipDetailSettingController;
use App\Http\Controllers\Admin\PayslipHEADSettingController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\GuaranteeFormController;

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


Route::middleware('auth')->prefix('accounting')->name('accounting.')->group(function() {
    Route::prefix('guarantee-form')->name('guaranteeForm.')->group(function () {
        Route::get('/', [GuaranteeFormController::class, 'index'])->name('index');
        Route::get('/create', [GuaranteeFormController::class, 'create'])->name('create');
        Route::post('/store', [GuaranteeFormController::class, 'store'])->name('store');
        Route::delete('/delete/{guaranteeForm}', [GuaranteeFormController::class, 'delete'])->name('delete');

        Route::get('/user-pdf/{guaranteeForm}', [GuaranteeFormController::class, 'userPdf'])->name('userPdf');
        Route::get('/accounting-pdf/{guaranteeForm}', [GuaranteeFormController::class, 'accountingPdf'])->name('accountingPdf');


        Route::get('/submit-code/{guaranteeForm}', [GuaranteeFormController::class, 'submitCode'])->name('submitCode');
        Route::post('/send-sms-for-guarantee-form/{guaranteeForm}', [GuaranteeFormController::class, 'sendSmsForGuaranteeForm'])->name('sendSmsForGuaranteeForm');
        Route::post('/post-submit-code/{guaranteeForm}', [GuaranteeFormController::class, 'postSubmitCode'])->name('postSubmitCode');

        Route::get('/details/{guaranteeForm}', [GuaranteeFormController::class, 'details'])->name('details');
    });
});


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


Route::prefix('guarantee-form-list')->name('guaranteeFormList.')->middleware('checkCeoAndCfoRole')->group(function () {
    Route::get('/', [GuaranteeFormListController::class, 'index'])->name('index');
    Route::get('/set-status/{guaranteeForm}', [GuaranteeFormListController::class, 'setStatus'])->name('setStatus');
    Route::post('/confirm/{guaranteeForm}', [GuaranteeFormListController::class, 'confirm'])->name('confirm');
    Route::post('/reject/{guaranteeForm}', [GuaranteeFormListController::class, 'reject'])->name('reject');
});

Route::prefix('admin-guarantee-form-list')->name('adminGuaranteeFormList.')->middleware('admin')->group(function () {
    Route::get('/', [AdminGuaranteeFormListController::class, 'index'])->name('index');
    Route::get('/set-status-draft/{guaranteeForm}', [AdminGuaranteeFormListController::class, 'setStatusDraft'])->name('setStatusDraft');
});

