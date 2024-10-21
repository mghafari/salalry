<?php

namespace App\Http\Controllers;

use App\Imports\SalaryImport;
use App\Imports\UsersImport;
use App\Models\cr;
use App\Models\Form;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function create()
    {
        $users= User::where('id', '>', 1)->get();
        return view('panel.user.input' ,compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'family'=>'required',
                'mobile'=>'required |unique:users',
                'national_code'=>'required |unique:users',

                'personal_code'=>'required |unique:users',
            ]
        );

        if(!validateNationalCode($request->national_code))
        {
            return back()->withErrors(' کد ملی صحیح نیست');
        }
        User::create(
            [
                'name'=>$request->name,
                'family'=>$request->family,
                'mobile'=>$request->mobile,
                'national_code'=>$request->national_code,
                'personal_code'=>$request->personal_code,
                'account_no'=>$request->account_no,
                'ins_no'=>$request->ins_no,

            ]
        );
        return back();
    }

    public function edit(User $user)
    {

        $users= User::where('id', '>', 1)->get();
        return view('panel.user.edit' ,compact('users' , 'user'));

    }

    public function update(User $user , Request $request)
    {
        $user->update(
            [
                'name'=>$request->name,
                'family'=>$request->family,
                'mobile'=>$request->mobile,
                'national_code'=>$request->national_code,
                'account_no'=>$request->account_no,
                'ins_no'=>$request->ins_no,
                'status'=>$request->status,

            ]
        );
        return back();

    }
    public function  destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function import(Request $request)
    {

        Excel::import(new UsersImport(), $request->file('file')->store('temp'));
        toastr()->success('اطلاعات با موفقیت وارد گردید!');
        return back();
        //
    }

    public function fish(User $user)
    {
        $auth=auth()->user();
        if($auth->role=='admin' or $auth==$user)
        {
            $files=Form::where('user_id' , $user->id)->paginate(15);
            return view('panel.file.index' ,compact('files'));

        }
        return abort('403');
    }
}
