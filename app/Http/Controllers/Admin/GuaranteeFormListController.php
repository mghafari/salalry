<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuaranteeForm;
use App\Models\GuaranteeFormDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Ramsey\Uuid\Guid\Guid;

class GuaranteeFormListController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'ceo')
        {
            $status = GuaranteeForm::STATUS_APPROVED_BY_CFO;
        } else if ($user->role == 'admin')
        {
            $status = GuaranteeForm::STATUS_APPROVED_BY_USER;
        } else if ($user->role == 'cfo') 
        {
            $status = GuaranteeForm::STATUS_APPROVED_BY_ADMIN;
        }
        $guaranteeForms = GuaranteeForm::where('status', $status)->paginate(30);


        return view('panel.guarantee_form_list.index', compact('guaranteeForms'));
    }

    public function setStatus(GuaranteeForm $guaranteeForm)
    {
        $view = view('panel.guarantee_form_list.set_status', compact('guaranteeForm'))->render();

        return Response::json(
            ['html' => $view],
            200
        );
    }

    public function confirm(GuaranteeForm $guaranteeForm, Request $request)
    {
        $user = Auth::user();
        if ($guaranteeForm->status == GuaranteeForm::STATUS_APPROVED_BY_USER && $user->role == 'admin')
        {
            DB::transaction(function () use ($guaranteeForm, $request) {
                $user = Auth::user();
    
                $guaranteeForm->update([
                    'status' => GuaranteeForm::STATUS_APPROVED_BY_ADMIN
                ]);
    
                GuaranteeFormDetail::create([
                    'gurantee_form_id' => $guaranteeForm->id,
                    'editor_id' => $user->id,
                    'editor_name' => $user->name(),
                    'comment' => $request->comment,
                    'old_status' => GuaranteeForm::STATUS_APPROVED_BY_USER,
                    'new_status' => GuaranteeForm::STATUS_APPROVED_BY_ADMIN
                ]);
            });
        } else if ($guaranteeForm->status == GuaranteeForm::STATUS_APPROVED_BY_ADMIN && $user->role == 'cfo')
        {
            DB::transaction(function () use ($guaranteeForm, $request) {
                $user = Auth::user();
    
                $guaranteeForm->update([
                    'status' => GuaranteeForm::STATUS_APPROVED_BY_CFO
                ]);
    
                GuaranteeFormDetail::create([
                    'gurantee_form_id' => $guaranteeForm->id,
                    'editor_id' => $user->id,
                    'editor_name' => $user->name(),
                    'comment' => $request->comment,
                    'old_status' => GuaranteeForm::STATUS_APPROVED_BY_ADMIN,
                    'new_status' => GuaranteeForm::STATUS_APPROVED_BY_CFO
                ]);
            });
        } else if ($guaranteeForm->status == GuaranteeForm::STATUS_APPROVED_BY_CFO && $user->role == 'ceo')
        {
            DB::transaction(function () use ($guaranteeForm, $request) {
                $user = Auth::user();
    
                $guaranteeForm->update([
                    'status' => GuaranteeForm::STATUS_APPROVED_BY_CEO
                ]);
    
                GuaranteeFormDetail::create([
                    'gurantee_form_id' => $guaranteeForm->id,
                    'editor_id'        => $user->id,
                    'editor_name'      => $user->name(),
                    'comment'          => $request->comment,
                    'old_status'       => GuaranteeForm::STATUS_APPROVED_BY_CFO,
                    'new_status'       => GuaranteeForm::STATUS_APPROVED_BY_CEO
                ]);
            });
        } else {
            return back()->with('error', 'وضعیت مورد نظر برای تایید مناسب نمیاباشد.');
        }



        return back()->with('success', 'عملیات با موفقیت انجام شد.');
    }

    public function reject(GuaranteeForm $guaranteeForm, Request $request)
    {
        $user = Auth::user();
        if ($guaranteeForm->status == GuaranteeForm::STATUS_APPROVED_BY_USER && $user->role == 'admin')
        {
            DB::transaction(function () use ($guaranteeForm, $request, $user) {
            

                $guaranteeForm->update([
                    'status' => GuaranteeForm::STATUS_REJECT_BY_ADMIN
                ]);
    
                GuaranteeFormDetail::create([
                    'gurantee_form_id' => $guaranteeForm->id,
                    'editor_id' => $user->id,
                    'editor_name' => $user->name(),
                    'comment' => $request->comment,
                    'old_status' => GuaranteeForm::STATUS_APPROVED_BY_USER,
                    'new_status' => GuaranteeForm::STATUS_REJECT_BY_ADMIN
                ]);
            });
        } else if ($guaranteeForm->status == GuaranteeForm::STATUS_APPROVED_BY_ADMIN && $user->role == 'cfo')
        {
            DB::transaction(function () use ($guaranteeForm, $request, $user) {
            

                $guaranteeForm->update([
                    'status' => GuaranteeForm::STATUS_REJECT_BY_CFO
                ]);
    
                GuaranteeFormDetail::create([
                    'gurantee_form_id' => $guaranteeForm->id,
                    'editor_id' => $user->id,
                    'editor_name' => $user->name(),
                    'comment' => $request->comment,
                    'old_status' => GuaranteeForm::STATUS_APPROVED_BY_ADMIN,
                    'new_status' => GuaranteeForm::STATUS_REJECT_BY_CFO
                ]);
            });
        } else if ($guaranteeForm->status == GuaranteeForm::STATUS_APPROVED_BY_CFO && $user->role == 'ceo')
        {
            DB::transaction(function () use ($guaranteeForm, $request) {
                $user = Auth::user();
    
                $guaranteeForm->update([
                    'status' => GuaranteeForm::STATUS_APPROVED_BY_CEO
                ]);
    
                GuaranteeFormDetail::create([
                    'gurantee_form_id' => $guaranteeForm->id,
                    'editor_id'        => $user->id,
                    'editor_name'      => $user->name(),
                    'comment'          => $request->comment,
                    'old_status'       => GuaranteeForm::STATUS_APPROVED_BY_CFO,
                    'new_status'       => GuaranteeForm::STATUS_REJECT_BY_CEO
                ]);
            });
        } else {
            return back()->with('error', 'وضعیت مورد نظر برای رد مناسب نمیاباشد.');
        }


        return back()->with('success', 'عملیات با موفقیت انجام شد.');
    }
}
