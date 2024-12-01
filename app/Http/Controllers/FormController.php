<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\SalaryImport;
use App\Imports\SalaryImportWithSetting;
use App\Models\Form;
use App\Models\PayslipHeadSetting;
use App\Models\Setting;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use function PHPUnit\Framework\isEmpty;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $forms=Form::where('id','>',1);
        if($request->has('year'))
        {
            $forms=   $forms->where('year', $request->year);

        }
        if($request->has('month'))
        {
            $forms=  $forms->where('month', $request->month);

        }
   $forms=  $forms->get();



        return view('panel.file.index.admin',compact('forms'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function form()
    {
        return view('panel.file.input');

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'year'  => 'required',
        ]);

        $payslipHeadSetting = PayslipHeadSetting::where('status', PayslipHeadSetting::STATUS_ACTIVE)->first();

        if (!$payslipHeadSetting)
        {
            return back()->with('error', 'لطفا یک تنطیمات دیفالت برای فیش حقوقی وارد کنید');
        }

        $nationalCodePlace = Setting::where('key', 'NATIONAL_CODE_PLACE')->first();
        $loginSetting = Setting::where('key', 'LOGIN_USER')->first();
        if (!$loginSetting) {
            return back()->with('error', 'لطفا نحوه ورود کاربر را از قسمت تنظیمات سیستم وارد کنید.');
        }

        if (!$nationalCodePlace || !isset($nationalCodePlace->value))
        {
            return back()->with('error', 'لطفا مکان کدملی را در قسمت تنظیمات سیستم وارد کنید.');
        }

        $settings = [
            'nationalCodePlace' => $nationalCodePlace->value,
        ];

        if ($loginSetting->value == 'pass') {
            $passwordPlace = Setting::where('key', 'PASSWORD_PLACE')->first();
            if (!$passwordPlace) {
                return back()->with('error', 'لطفا مکان پسورد را در قسمت تنظیمات سیستم وارد کنید.');
            }
            $settings['passwordPlace'] = $passwordPlace->value;
        }

        Excel::import(new SalaryImportWithSetting($request->year, $request->month, $payslipHeadSetting, $settings), $request->file('file')->store('temp'));
        toastr()->success('اطلاعات با موفقیت وارد گردید!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Form $form
     * @return Application|Factory|View
     */
    public function showUser(Request $request)
    {
        $user = Auth::user();
        if ($request->has('year') and $request->has('month')) {
            $form = Form::where('user_id', Auth::id())->where('year', $request->year)->where('month', $request->month)->first();

        } else {

            $form = Form::where('user_id', $user->id)->orderby('year', 'desc')->orderby('month', 'desc')->first();


        }

        return view('panel.fish.show', compact('form', 'user'));
    }

    public function showAdmin(Request $request)
    {

        $users = User::orderby('family')->get();
        if ($request->has('year') and $request->has('month') and $request->has('user')) {
            $form = Form::where('user_id', $request->user)->where('year', $request->year)->where('month', $request->month)->first();


        } else {
            $form = Form::where('user_id', Auth::id())->orderby('month')->orderby('year')->first();

        }


        return view('panel.fish.show', compact('form', 'users'));


        //
    }

    public function latestForm()
    {
        if (Auth::user()->role == 'admin') {
            return redirect(route('admin.fish.show'));
        } elseif(Auth::user()->role == 'cfo') {
            return redirect(route('guaranteeFormList.index'));
        } elseif(Auth::user()->role == 'ceo') {
            return redirect(route('guaranteeFormList.index'));
        } else {
            return redirect(route('user.fish.show'));

        }


        // $pdf = Pdf::loadView('panel.fish.show', compact('form','user'));
        //  return $pdf->stream('report.pdf');

        //  return view('panel.fish.show', compact('form','user'));
    }

    public function print(Form $form)
    {


        return view('panel.fish.pdf', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Form $form
     * @return Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Form $form
     * @return Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Form $form
     * @return Response
     */
    public function destroy(Form $form)
    {
        $form->delete();
        return back();
        //
    }

    public function show(Form $form)
    {
        $user=\auth()->user();

        if($user->role=='admin' or  $user->id ==$form->user_id )
        {
            return \view('panel.fish.show',compact('form'));

        }else
            return abort('403');
    }
}
