@php
    use App\Models\Setting;
@endphp
@extends('panel.main')
@section('body')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>ثبت کد تایید</h4>

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
                    <h4 class="card-title">ثبت کد تایید</h4>
                </div>
                <div class="card-body" id="app">
                    <div class="basic-form">
                        <form method="post" action="{{route('accounting.guaranteeForm.postSubmitCode', $guaranteeForm->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row align-items-center">
                                <div class="form-group col-md-6 col-12">
                                    <label>کد تایید</label>
                                    <input class="form-control"  name="code" />
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <a class="btn btn-success btn-xs text-white mt-4" onclick="submitCode({{ $guaranteeForm->id }})">ارسال کد تایید</a>
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
        function submitCode(guaranteeForm)
        {
            $.ajax({
                method: 'post',
                url: `{{ route('accounting.guaranteeForm.sendSmsForGuaranteeForm', ['guaranteeForm' => ':guaranteeForm']) }}`.replace(':guaranteeForm', guaranteeForm),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token here
                },
                success: function(data) {
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred.'); // Handle error
                }
            });
            
        }
    </script>
@endsection
