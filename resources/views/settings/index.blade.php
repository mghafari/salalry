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

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>جمع مزایا</label>
                                    <select name="total_benefit" class="form-control" id="">
                                        <option selected value="">هیچکدام</option>
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}" @if(isset($settings['TOTAL_BENEFIT']) && $settings['TOTAL_BENEFIT'] == $i) selected @endif >{{ Setting::getExcelColumn($i) }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label>جمع کسورات</label>
                                    <select name="total_deduction" class="form-control" id="">
                                        <option selected value="">هیچکدام</option>
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}" @if(isset($settings['TOTAL_DEDUCTION']) && $settings['TOTAL_DEDUCTION'] == $i) selected @endif >{{ Setting::getExcelColumn($i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>جمع اقساط</label>
                                    <select name="total_installment" class="form-control" id="">
                                        <option selected value="">هیچکدام</option>
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}" @if(isset($settings['TOTAL_INSTALLMENT']) && $settings['TOTAL_INSTALLMENT'] == $i) selected @endif >{{ Setting::getExcelColumn($i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>خالص پرداختی</label>
                                    <select name="net_paid" class="form-control" id="">
                                        <option selected value="">هیچکدام</option>
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}" @if(isset($settings['NET_PAID']) && $settings['NET_PAID'] == $i) selected @endif >{{ Setting::getExcelColumn($i) }}</option>
                                        @endfor
                                    </select>
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
