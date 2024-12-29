<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayslipHeadSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayslipHeadSettingController extends Controller
{
    public function index()
    {
        $payslip_heads = PayslipHeadSetting::orderBy('created_at', 'desc')->paginate(20);
        
        return view('settings.payslip.heads', compact('payslip_heads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                   => 'required',
            'place_total_benefit'     => 'required',
            'place_total_deduction'   => 'required',
            'place_total_installment' => 'required',
            'place_net_paid'          => 'required',
        ]);

        $variables = [$request->place_total_benefit, $request->place_total_deduction, $request->place_total_installment, $request->place_net_paid]; // متغیرهای خود را اینجا قرار دهید

        if (count($variables) !== count(array_unique($variables))) {
            return back()->with('error', 'یکی از فیلد های جمع مزایا یا جمع کسورات یا جمع اقساط یا خالص پرداختی مشابه دیگری است.');
        }



        DB::transaction(function () use ($request) {
            PayslipHeadSetting::where('status', PayslipHeadSetting::STATUS_ACTIVE)->update([
                'status' => PayslipHeadSetting::STATUS_DEACTIVE
            ]);

            PayslipHeadSetting::create([
                'title'                   => $request->title,
                'place_total_benefit'     => $request->place_total_benefit,
                'place_total_deduction'   => $request->place_total_deduction,
                'place_total_installment' => $request->place_total_installment,
                'place_net_paid'          => $request->place_net_paid,
                'status'                  => $request->status
            ]);            
        });


        return back()->with('success', 'عملیات با موفقیت انجام شد.');
    }

    public function edit(PayslipHeadSetting $payslipHeadSetting)
    {
        $payslip_heads = PayslipHeadSetting::orderBy('created_at', 'desc')->paginate(20);
        
        return view('settings.payslip.heads', compact('payslip_heads', 'payslipHeadSetting'));
    }

    public function update(PayslipHeadSetting $payslipHeadSetting, Request $request)
    {
        
        $request->validate([
            'title' => 'required',
        ]);

        DB::transaction(function () use ($request, $payslipHeadSetting) {
            if ($request->status == PayslipHeadSetting::STATUS_ACTIVE) {
                PayslipHeadSetting::where('status', PayslipHeadSetting::STATUS_ACTIVE)->update([
                    'status' => PayslipHeadSetting::STATUS_DEACTIVE
                ]);
            }

            $payslipHeadSetting->update([
                'title'  => $request->title,
                'status' => $request->status
            ]);

        });

        return back()->with('success', 'عملیات با موفقیت انجام شد.');
    }
}
