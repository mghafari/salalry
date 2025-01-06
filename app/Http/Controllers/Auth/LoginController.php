<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\Sms;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function session;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm()
    {
      /*  $users=User::all();
        foreach ($users as $user)
        {
            $user->update(
                [
                    'mobile'=>getMobile($user->mobile)
                ]
            );

        }*/
        return view('login.mobile');
    }

    public function sendSms(Request $request)
    {

        $user = $this->userExist($request);
        if ($user == null) {
            //return back()->withErrors( 'شماره موبایل ارسالی در سیستم ثبت نشده است ');
            return back()->withErrors(' شماره مویایل وارد شده در سیستم وجود ندارد');

        }
        if(!$user->status)
        {
            return back()->withErrors(' شماره مویایل وارد شده فعال نمی باشد');
        }

        $loginSetting = Setting::where('key', 'LOGIN_USER')->first();

        if ($loginSetting && $loginSetting->value == 'pass' && $user->role == 'user')
        {
            session()->put('userId', $user->id);
            return view('login.password');
        }


        $code = rand(10000, 99999);
        // dd($code);
        $user->update(['sms_code' => $code, 'sms_send_at' => Carbon::now(),

        ]);
        session()->put('userId', $user->id);
        session()->put('mobile', getMobile($request->mobile));
      $this->sms(getMobile($request->mobile), $code);


        return redirect(route('login.smsForm'));

    }

    public function userExist(Request $request)
    {
        return User::where('mobile', getMobile($request->mobile))->first();


    }
    public function userActive(Request $request)
    {
      $user= User::where('mobile', getMobile($request->mobile))->first();

      return $user->status ?? 0;


    }

    public function sms($mobile, $code)
    {
        $data = array('code' => $code);
        Sms::send($mobile, $data, env('SMS_LOGIN_PATTERN'));
    }

    public function login(Request $request)
    {


        if (session()->has('userId')) {
            $user = User::find(session()->get('userId'));




       if ($user->sms_code == $request->code) {
         //  if ($request->code== 1234) {


               $user = User::find(session()->get('userId'));
               Auth::login($user);

               if($user->role=='admin')
               {
                   return redirect(route('user.create'));

               }

               return redirect(route('user.fish' , $user));
                //  dd(1);

            } else {
                return back()->withErrors('کد وارد شده صحیح نیست');

            }

        }


        // $this->validateForm($request);


    }



    public function loginPassword(Request $request)
    {
        if (!session()->has('userId')) {
            return redirect()->route('login');
        }

        $user = User::find(session()->get('userId'));

        if (!Hash::check($request->password, $user->password)) {
            
            return redirect()->route('login')->with('error', 'نام کاربری یا رمز شما اشتباه است.');
        }

        
        Auth::login($user);

        if($user->role=='admin')
        {
            return redirect(route('user.create'));

        }

        return redirect(route('user.fish' , $user));

    }





    public function attemptLogin(Request $request)
    {
        // return  Auth::attempt($request->only('mobile','password'),$request->filled('remember'));


    }

    public function validateForm(Request $request)
    {
        $request->validate(['mobile' => 'required|string',

        ]);
    }

    public function smsForm()
    {
        if (session()->has('userId')) {

            $user = User::find(session()->get('userId'));
            if (session()->has('mobile')) {
                $mobile = substr_replace(session()->get('mobile'), "****", 4, 4);


                return view('login.code', compact('mobile'));


            } else {
                return back()->withErrors('شماره موبایل شما در سیستم وجود ندارد');
            }

        }
        return redirect(route('login'));

    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        return redirect()->route('login');


    }


    //
}
