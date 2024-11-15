@php
    use App\Models\Setting;
@endphp
@extends('panel.main')
@section('body')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>ثبت درخواست ضمانت حسابداری</h4>

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
                    <h4 class="card-title">ثبت درخواست ضمانت حسابداری</h4>
                </div>
                <div class="card-body" id="app">
                    <div class="basic-form">
                        <form method="post" action="{{route('accounting.guaranteeForm.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>ثبت درخواست برای</label>
                                    <select class="form-control" name="registration_owner" id="registration_owner">
                                        @foreach(App\Models\GuaranteeForm::TITLE_REGISTRATION_OWNER as $key => $registrationOwner)
                                            <option value="{{ $key }}">{{ $registrationOwner }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row" id="other_options" style="display:none;">
                                <div class="form-group col-md-6 col-12">
                                    <label>کدملی درخواست کننده</label>
                                    <input type="text" name="other_national_id" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>نام درخواست کننده</label>
                                    <input type="text" name="other_first_name" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>نام‌خانوادگی درخواست کننده</label>
                                    <input type="text" name="other_last_name" class="form-control">
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6 col-12">
                                    <label for="toggle-checkbox">صندوق شجره نصر</label>
                                    <input type="checkbox" name="type_shajareh" style="margin-right: 3px" id="toggle-checkbox">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-12" id="bank-or-institution-field">
                                    <label>نام موسسه یا بانک</label>
                                    <input type="text" name="bank_or_institution" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>مبلغ (ریال)</label>
                                    <input type="text" name="price" class="form-control">
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
    <script>
        $(document).ready(function() {
            $('#registration_owner').on('change', function() {
                if ($(this).val() == 2) {
                    $('#other_options').show();
                } else {
                    $('#other_options').hide();
                }
            });
        });
    </script>
    <script>
        const checkbox = document.getElementById('toggle-checkbox');

        checkbox.addEventListener('change', function () {
            if ($(this).is(':checked')) {
                $('#bank-or-institution-field').hide();
            } else {
                $('#bank-or-institution-field').show();
            }
        });
    </script>
@endsection
