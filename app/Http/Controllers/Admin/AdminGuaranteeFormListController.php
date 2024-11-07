<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuaranteeForm;
use App\Models\GuaranteeFormDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminGuaranteeFormListController extends Controller
{
    public function index()
    {
        $guaranteeForms = GuaranteeForm::paginate(30);

        return view('panel.admin_guarantee_form_list.index', compact('guaranteeForms'));
    }


    public function setStatusDraft(GuaranteeForm $guaranteeForm, Request $request)
    {
        $user = Auth::user();

        DB::transaction(function () use ($guaranteeForm, $request, $user) {
            

            $guaranteeForm->update([
                'status' => GuaranteeForm::STATUS_DEACTIVE
            ]);

            GuaranteeFormDetail::create([
                'gurantee_form_id' => $guaranteeForm->id,
                'editor_id'        => $user->id,
                'editor_name'      => $user->name(),
                'comment'          => $request->comment,
                'old_status'       => GuaranteeForm::STATUS_APPROVED_BY_CEO,
                'new_status'       => GuaranteeForm::STATUS_DEACTIVE
            ]);
        });

        return back()->with('success', 'تغییر وضعیت با موفقیت انجام شد.');
        
    }
}
