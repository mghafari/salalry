<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayslipHeadSetting;
use App\Models\PayslipSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayslipDetailSettingController extends Controller
{
    public function index(PayslipHeadSetting $payslipHeadSetting)
    {
        $payslipDetailSettings = PayslipSetting::where('payslip_head', $payslipHeadSetting->id)->paginate(20);

        return view('settings.payslip.detail.index', compact('payslipDetailSettings', 'payslipHeadSetting'));
    }

    public function store(PayslipHeadSetting $payslipHeadSetting, Request $request)
    {
        $request->validate([
            'index'    => 'required',
            'title'    => 'required',
            'category' => 'required|in:' . implode(',', array_keys(PayslipSetting::TITLE_CATEGORY)),
            'status'   => 'required|in:' . implode(',', array_keys(PayslipSetting::TITLE_STATUS)),
            'sort'     => 'required|integer'
        ]);

        $payslip_setting = PayslipSetting::where('payslip_head', $payslipHeadSetting->id)->where('index', $request->index)->first();

        if ($payslip_setting)
        {
            return back()->with('error', 'برای این ستون رکورد ثبت شده است.');
        }

        PayslipSetting::create([
            'payslip_head' => $payslipHeadSetting->id,
            'index'        => $request->index,
            'title'        => $request->title,
            'category'     => $request->category,
            'visible_zero' => $request->visible_zero,
            'status'       => $request->status,
            'sort'         => en_num($request->sort)
        ]);


        return back()->with('success', 'عملیات با موفقیت انجام شد.');
    }

    public function edit(PayslipHeadSetting $payslipHeadSetting, PayslipSetting $payslipSetting)
    {
        $payslipDetailSettings = PayslipSetting::where('payslip_head', $payslipHeadSetting->id)->paginate(20);

        return view('settings.payslip.detail.index', compact('payslipDetailSettings', 'payslipHeadSetting', 'payslipSetting'));
    }

    public function update(PayslipHeadSetting $payslipHeadSetting, PayslipSetting $payslipSetting, Request $request)
    {
        $request->validate([
            'index'    => 'required',
            'title'    => 'required',
            'category' => 'required|in:' . implode(',', array_keys(PayslipSetting::TITLE_CATEGORY)),
            'status'   => 'required|in:' . implode(',', array_keys(PayslipSetting::TITLE_STATUS)),
            'sort'     => 'required|integer'
        ]);

        $payslip_setting = PayslipSetting::where('payslip_head', $payslipHeadSetting->id)->where('index', $request->index)->where('id', '!=', $payslipSetting->id)->first();

        if ($payslip_setting)
        {
            return back()->with('error', 'برای این ستون رکورد ثبت شده است.');
        }

        $payslipSetting->update([
            'payslip_head' => $payslipHeadSetting->id,
            'index'        => $request->index,
            'title'        => $request->title,
            'category'     => $request->category,
            'visible_zero' => $request->visible_zero,
            'status'       => $request->status,
            'sort'         => en_num($request->sort)
        ]);


        return back()->with('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete(PayslipHeadSetting $payslipHeadSetting, PayslipSetting $payslipSetting) 
    {

        try {
            $payslipSetting->delete();
            return back();
        } catch (\Exception $e) {
            return back()->with('error','متاسفانه حذف انجام نشد.');
        }

        return back()->with('success','حذف با موفقیت انجام شد.');
    }
}
