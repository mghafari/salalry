@php
    use App\Models\Setting;
    use App\Models\PayslipHeadSetting;
@endphp
@extends('panel.main')
@section('body')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>تنظیمات</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تنظیمات فیش حقوقی</h4>
            </div>

            <div class="card-body">

                <div class="table-responsive mt-4">
                    <table id="example2" class="display" style="width:100%; border-bottom: 1px solid black">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>جمع مزایا</th>
                                <th>جمع کسورات</th>
                                <th>جمع اقساط</th>
                                <th>خالص پرداختی</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <thead style="margin-bottom: 1px solid rgba(0, 0, 0, 0.125)">
                            <form id="payslip-form" action="@if(isset($payslipHeadSetting)) {{ route('settings.payslip.update', $payslipHeadSetting->id) }} @else {{ route('settings.payslip.store') }} @endif" method="POST">
                                @csrf
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="text" value="@if(isset($payslipHeadSetting)) {{ $payslipHeadSetting->title }} @endif" class="form-control" name="title" placeholder="عنوان تنظیمات جدید">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="place_total_benefit" id="" class="form-control">
                                            @for ($i = 0; $i <= 100; $i++)
                                                <option @if(isset($payslipHeadSetting) && $payslipHeadSetting->place_total_benefit == $i)  selected @endif value="{{ $i }}">{{ Setting::getExcelColumn($i) }}</option>
                                            @endfor
                                        </select>
                                        @error('place_total_benefit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="place_total_deduction" id="" class="form-control">
                                            @for ($i = 0; $i <= 100; $i++)
                                                <option @if(isset($payslipHeadSetting) && $payslipHeadSetting->place_total_deduction == $i)  selected @endif value="{{ $i }}">{{ Setting::getExcelColumn($i) }}</option>
                                            @endfor
                                        </select>
                                        @error('place_total_deduction')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="place_total_installment" id="" class="form-control">
                                            @for ($i = 0; $i <= 100; $i++)
                                                <option @if(isset($payslipHeadSetting) && $payslipHeadSetting->place_total_installment == $i)  selected @endif value="{{ $i }}">{{ Setting::getExcelColumn($i) }}</option>
                                            @endfor
                                        </select>
                                        @error('place_total_installment')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="place_net_paid" id="" class="form-control">
                                            @for ($i = 0; $i <= 100; $i++)
                                                <option @if(isset($payslipHeadSetting) && $payslipHeadSetting->place_net_paid == $i)  selected @endif value="{{ $i }}">{{ Setting::getExcelColumn($i) }}</option>
                                            @endfor
                                        </select>
                                        @error('place_net_paid')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="status" class="form-control">
                                            @foreach(PayslipHeadSetting::TITLE_STATUS as $key => $value)
                                                <option @if(isset($payslipHeadSetting) && $payslipHeadSetting->status == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <button type="submit" class="btn @if(isset($payslipHeadSetting)) btn-info @else btn-success @endif " id="submit-btn">@if(isset($payslipHeadSetting)) ویرایش @else ایجاد @endif </button>
                                    </td>
                                </tr>
                            </form>
                        </thead>
                        <tbody>
                            @foreach ($payslip_heads as $payslip_head)
                                <tr class="text-center">
                                    <td>{{ $payslip_head->id }}</td>
                                    <td>{{ $payslip_head->title }}</td>
                                    <td>{{ isset($payslip_head->place_total_benefit) ? Setting::getExcelColumn($payslip_head->place_total_benefit) : 'ثبت نشده' }}</td>
                                    <td>{{ isset($payslip_head->place_total_deduction) ? Setting::getExcelColumn($payslip_head->place_total_deduction) : 'ثبت نشده' }}</td>
                                    <td>{{ isset($payslip_head->place_total_installment) ? Setting::getExcelColumn($payslip_head->place_total_installment) : 'ثبت نشده' }}</td>
                                    <td>{{ isset($payslip_head->place_net_paid) ? Setting::getExcelColumn($payslip_head->place_net_paid) : 'ثبت نشده' }}</td>
                                    <td>{{ PayslipHeadSetting::TITLE_STATUS[$payslip_head->status] }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('settings.payslip.edit', $payslip_head->id) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="{{ route('settings.payslip.detail.index', $payslip_head->id) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                    class="fa fa-cog"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirm delete function -->
<script>
    function ConfirmDelete() {
        var x = confirm("آیا مطمئنید؟");
        return x ? true : false;
    }
</script>

<!-- Include Vue.js and custom scripts if necessary -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="/assets/js/script.js"></script>

@endsection
