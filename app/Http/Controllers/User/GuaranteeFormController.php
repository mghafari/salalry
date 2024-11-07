<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GuaranteeForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Sms;
use App\Models\GuaranteeFormDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class GuaranteeFormController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user)
        {
            return back();
        }

        $guaranteeForms = GuaranteeForm::where('user_id', $user->id)->paginate(30);
        $user = Auth::user();
        
        return view('panel.user_panel.accounting.guarantee.index', compact('guaranteeForms', 'user'));
    }


    public function create()
    {
        return view('panel.user_panel.accounting.guarantee.create');
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        if ($request->registration_owner == GuaranteeForm::OTHER_REGISTRATION_OWNER)
        {
            $request->validate([
                'other_national_id'   => 'required',
                'other_first_name'    => 'required',
                'other_last_name'     => 'required',
                'bank_or_institution' => 'required',
                'price'               => 'required',
            ]);
        } else {
            $request->validate([
                'bank_or_institution' => 'required',
                'price'               => 'required',
            ]);
        }


        DB::transaction(function () use ($request, $user) {

            $guaranteeForm = GuaranteeForm::create([
                'user_id'             => $user->id,
                'price'               => en_num($request->price),
                'bank_or_institution' => $request->bank_or_institution,
                'registration_owner'  => $request->registration_owner,
                'other_first_name'    => $request->other_first_name ?? $user->first_name,
                'other_last_name'     => $request->other_last_name ?? $user->last_name,
                'other_nationale_id'  => $request->other_nationale_id ?? $user->national_id,
                'status'              => GuaranteeForm::STATUS_DRAFT,
                'active_status'       => false
            ]);

            GuaranteeFormDetail::create([
                'gurantee_form_id' => $guaranteeForm->id,
                'editor_id'        => $user->id,
                'editor_name'      => $user->name(),
                'new_status'       => GuaranteeForm::STATUS_DRAFT
            ]);
    
        });


        return redirect()->route('accounting.guaranteeForm.index')->with('success', 'درخواست شما با موفقیت ثبت شد.');

    }


    public function delete(GuaranteeForm $guaranteeForm)
    {
        try {
            $guaranteeForm->delete();
        } catch (\Exception $e) {
            return back()->with('alert.danger','متاسفانه حذف انجام نشد.');
        }

        return back()->with('alert.success','حذف با موفقیت انجام شد.');
    }


    public function submitCode(GuaranteeForm $guaranteeForm)
    {
        return view('panel.user_panel.accounting.guarantee.submit_code', compact('guaranteeForm'));
    }


    public function sendSmsForGuaranteeForm(GuaranteeForm $guaranteeForm)
    {
        if ($guaranteeForm->status != GuaranteeForm::STATUS_DRAFT)
        {
            return back()->with('error', 'شماره شما قبلا تایید شده است.');
        }
        $code = rand(10000, 99999);
        $mobile = $guaranteeForm->user->mobile;
        session()->put('guaranteFormCode', $code);

        $data = array('code' => $code);
        Sms::send($mobile, $data, env('SMS_LOGIN_PATTERN'));

        return response()->json([
            'message' => ' کد تایید با موفقیت به شماره '. $mobile . ' ارسال شد.',
        ],200);
    }


    public function postSubmitCode(GuaranteeForm $guaranteeForm, Request $request)
    {
        if ($guaranteeForm->status != GuaranteeForm::STATUS_DRAFT)
        {
            return back()->with('error', 'شماره شما قبلا تایید شده است.');
        }
        
        $code = en_num($request->code);
        $user = Auth::user();

        $sessionCode = session()->get('guaranteFormCode');

        if ($sessionCode != $code)
        {
            return back()->with('error', 'کد وارد شده اشتباه است.');
        }

        DB::transaction(function () use ($guaranteeForm, $user) {
            $guaranteeForm->update([
                'status' => GuaranteeForm::STATUS_APPROVED_BY_USER
            ]);

            GuaranteeFormDetail::create([
                'gurantee_form_id' => $guaranteeForm->id,
                'editor_id'        => $user->id,
                'editor_name'      => $user->name(),
                'old_status'       => GuaranteeForm::STATUS_DRAFT,
                'new_status'       => GuaranteeForm::STATUS_APPROVED_BY_USER
            ]);
        });


        return redirect()->route('accounting.guaranteeForm.index')->with('success', 'عملیات با موفقیت انجام شد.');

    }


    public function details(GuaranteeForm $guaranteeForm)
    {
        $guaranteeFormDetails = GuaranteeFormDetail::where('gurantee_form_id', $guaranteeForm->id)
        ->get();

        $view = view('panel.user_panel.accounting.guarantee.detail_modal', compact('guaranteeForm', 'guaranteeFormDetails'))->render();

        return Response::json(
            ['html' => $view],
            200
        );
    }
}
