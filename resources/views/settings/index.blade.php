@php
    use App\Models\Setting;
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
                    <h4 class="card-title">تنظیمات سیستم</h4>
                </div>
                <div class="card-body" id="app">
                    <div class="basic-form">
                        <form method="post" action="{{route('settings.save')}}" enctype="multipart/form-data">
                            @csrf

                            <p>اطلاعات ورود کابر</p>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>نحوه ورود کاربر</label>
                                    <select name="login_user" class="form-control" id="">
                                        <option value="otp" @if(isset($settings['LOGIN_USER']) && $settings['LOGIN_USER'] == 'otp') selected @endif selected>ورود با کد تایید</option>
                                        <option value="pass" @if(isset($settings['LOGIN_USER']) && $settings['LOGIN_USER'] == 'pass') selected @endif>ورود با پسورد</option>

                                    </select>
                                </div>
                            </div>

                            <p>اطلاعات کابر</p>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>کدملی</label>
                                    <select name="national_code_place" class="form-control" id="">
                                        <option value="" disabled selected>انتخاب کنید</option>
                                        @for ($i = 0; $i <= 100; $i++)
                                            <option value="{{ $i }}" @if(isset($settings['NATIONAL_CODE_PLACE']) && $settings['NATIONAL_CODE_PLACE'] == $i) selected @endif >{{ Setting::getExcelColumn($i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>پسورد</label>
                                    <select name="password_place" class="form-control" id="">
                                        <option value="" disabled selected>انتخاب کنید</option>
                                        @for ($i = 0; $i <= 100; $i++)
                                            <option value="{{ $i }}" @if(isset($settings['PASSWORD_PLACE']) && $settings['PASSWORD_PLACE'] == $i) selected @endif >{{ Setting::getExcelColumn($i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <p>ضمانت حسابداری</p>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>ماکزیمم مبلغ ضمانت حسابداری (ریال)</label>
                                    <input class="form-control" type="text" name="max_guarantee_form" value="@if(isset($settings['MAX_GUARANTEE_FORM'])) {{ $settings['MAX_GUARANTEE_FORM'] }} @endif">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>









    <script>
        function ConfirmDelete() {
            var x = confirm("آیا مطمئنید؟");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="/assets/js/script.js"></script>
@endsection
