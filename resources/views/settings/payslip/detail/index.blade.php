@php
    use App\Models\Setting;
    use App\Models\PayslipHeadSetting;
    use App\Models\PayslipSetting;
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
            <a href="{{ route('settings.payslip.index') }}">تنظیمات فیش حقوقی</a>
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
                                <th>ستون</th>
                                <th>برچسب</th>
                                <th>جایگاه</th>
                                <th>وضعیت</th>
                                <th>عدم نمایش در صورت صفر بودن</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <thead style="margin-bottom: 1px solid rgba(0, 0, 0, 0.125)">
                            <form id="payslip-form" action="@if(isset($payslipSetting)) {{ route('settings.payslip.detail.update', ['payslipHeadSetting' => $payslipHeadSetting->id, 'payslipSetting' => $payslipSetting->id]) }} @else {{ route('settings.payslip.detail.store', $payslipHeadSetting->id) }} @endif" method="POST">
                                @csrf
                                <tr>
                                    <td></td>
                                    <td>
                                        <select name="index" id="">
                                            @for ($i = 1; $i <= 100; $i++)
                                                <option @if(isset($payslipSetting) && $payslipSetting->index == $i)  selected @endif value="{{ $i }}">{{ Setting::getExcelColumn($i) }}</option>
                                            @endfor
                                        </select>
                                        @error('index')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" value="@if(isset($payslipSetting)) {{ $payslipSetting->title }} @endif" name="title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="category" id="">
                                            @foreach(PayslipSetting::TITLE_CATEGORY as $key => $value)
                                            <option value="{{ $key }}" @if(isset($payslipSetting) && $payslipSetting->category == $key) selected @endif >
                                                {{ $value }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="status" class="form-control">
                                            @foreach(PayslipSetting::TITLE_STATUS as $key => $value)
                                                <option @if(isset($payslipSetting) && $payslipSetting->status == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="visible_zero" class="form-control">
                                            @foreach(PayslipSetting::TITLE_STATUS as $key => $value)
                                                <option @if(isset($payslipSetting) && $payslipSetting->visible_zero == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('visible_zero')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <button type="submit" class="btn @if(isset($payslipSetting)) btn-info @else btn-success @endif " id="submit-btn">@if(isset($payslipSetting)) ویرایش @else ایجاد @endif </button>
                                    </td>
                                </tr>
                            </form>
                        </thead>
                        <tbody>
                            @foreach ($payslipDetailSettings as $payslipDetailSetting)
                                <tr class="text-center">
                                    <td>{{ $payslipDetailSetting->id }}</td>
                                    <td>{{ Setting::getExcelColumn($payslipDetailSetting->index) }}</td>
                                    <td>{{ $payslipDetailSetting->title }}</td>
                                    <td>{{ PayslipSetting::TITLE_CATEGORY[$payslipDetailSetting->category] }}</td>
                                    <td>
                                        {{ PayslipSetting::TITLE_STATUS[$payslipDetailSetting->status] }}
                                    </td>
                                    <td>{{ PayslipSetting::TITLE_STATUS[$payslipDetailSetting->visible_zero] }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('settings.payslip.detail.edit', ['payslipHeadSetting' => $payslipHeadSetting->id, 'payslipSetting' => $payslipDetailSetting->id]) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                    class="fa fa-pencil"></i></a>
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
