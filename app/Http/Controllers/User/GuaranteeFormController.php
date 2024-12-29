<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GuaranteeForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Sms;
use App\Models\GuaranteeFormDetail;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

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
                'price'               => 'required',
            ]);
        } else {
            $request->validate([
                'price'               => 'required',
            ]);
        }

        $max_guarantee_form = $user->max_guarantee_form;

        if (!isset($max_guarantee_form))
        {
            $setting = Setting::where('key', 'MAX_GUARANTEE_FORM')->first();
            if ($setting)
            {
                $max_guarantee_form = $setting->value;
            }
            
        }


        if (isset($max_guarantee_form))
        {
            $guaranteeFormTotalPrice = GuaranteeForm::where('user_id', $user->id)->where('status', '!=', GuaranteeForm::STATUS_DEACTIVE)->sum('price');

            $guaranteeFormTotalPrice = en_num($guaranteeFormTotalPrice);
            $guaranteeFormTotalPrice = $guaranteeFormTotalPrice + en_num($request->price);
            $max_guarantee_form = en_num($max_guarantee_form);

            if ($max_guarantee_form < $guaranteeFormTotalPrice)
            {
                return back()->with('error', 'مبلغ درخواست مورد نظر از میزان تعریف شده برای شما بیشتر است.');
            }
        }
        


        DB::transaction(function () use ($request, $user) {

            $guaranteeForm = GuaranteeForm::create([
                'user_id'             => $user->id,
                'price'               => en_num($request->price),
                'bank_or_institution' => isset($request->type_shajareh) ? 'صندوق شجره نصر' : $request->bank_or_institution,
                'type_shajareh'       => isset($request->type_shajareh) ? true : false,
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
            return back()->with('error','متاسفانه حذف انجام نشد.');
        }

        return back()->with('error','حذف با موفقیت انجام شد.');
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
        // $code = rand(10000, 99999);
        $code = 1000;
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


    public function userPdf(GuaranteeForm $guaranteeForm)
    {
        $user = Auth::user();
        if ($user->role != 'admin' && $user->role != 'cfo' && $user->role != 'ceo' && $user->id != $guaranteeForm->user_id)
        {
            return abort('403');
        }
        $userGuaranteeForm = GuaranteeFormDetail::where('gurantee_form_id', $guaranteeForm->id)->where('new_status', GuaranteeForm::STATUS_APPROVED_BY_USER)->first();
        $cfoGuaranteeForm  = GuaranteeFormDetail::where('gurantee_form_id', $guaranteeForm->id)->where('new_status', GuaranteeForm::STATUS_APPROVED_BY_CFO)->first();
        $ceoGuaranteeForm  = GuaranteeFormDetail::where('gurantee_form_id', $guaranteeForm->id)->where('new_status', GuaranteeForm::STATUS_APPROVED_BY_CEO)->first();


        if ($guaranteeForm->registration_owner == GuaranteeForm::YOURSEF_REGISTRATION_OWNER)
        {
            $pdf = Pdf::loadView('panel.user_panel.accounting.guarantee.pdf.user_pdf', compact('guaranteeForm', 'userGuaranteeForm', 'cfoGuaranteeForm', 'ceoGuaranteeForm'));
        } else {
            $pdf = Pdf::loadView('panel.user_panel.accounting.guarantee.pdf.other_user_pdf', compact('guaranteeForm', 'userGuaranteeForm', 'cfoGuaranteeForm', 'ceoGuaranteeForm'));
        }
        

        return $pdf->stream('user_pdf_'.$guaranteeForm->id.'.pdf');
    }


    public function accountingPdf(GuaranteeForm $guaranteeForm)
    {
        if ($guaranteeForm->type_shajareh)
        {
            $pdf = Pdf::loadView('panel.user_panel.accounting.guarantee.pdf.shajareh_accounting_pdf', compact('guaranteeForm'));
        } elseif (!$guaranteeForm->type_shajareh && $guaranteeForm->registration_owner == GuaranteeForm::OTHER_REGISTRATION_OWNER) {
            $pdf = Pdf::loadView('panel.user_panel.accounting.guarantee.pdf.accounting_pdf', compact('guaranteeForm'));
        }

        return $pdf->stream('accounting_pdf_'.$guaranteeForm->id.'.pdf');
    }
}
