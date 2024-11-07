@php
    use App\Models\GuaranteeForm;
@endphp
@extends('panel.main')
@section('body')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>کارتابل درخواست ضمانت حسابداری</h4>

            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">کارتابل درخواست ضمانت حسابداری</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ثبت درخواست برای</th>
                                    <th>کدملی درخواست کننده</th>
                                    <th>ثبت شده توسط</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($guaranteeForms as $guaranteeForm)
                                    <tr>
                                        <td>{{ $guaranteeForm->other_first_name ? ($guaranteeForm->other_first_name . ' ' . $guaranteeForm->other_last_name) : $guaranteeForm->user->name() }}</td>
                                        <td>{{ $guaranteeForm->other_national_id ? fa_num($guaranteeForm->other_national_id) : fa_num($guaranteeForm->user->national_code) }}</td>
                                        <td>{{ $guaranteeForm->user->name() }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-primary btn-xs mr-2" data-toggle="modal" onclick="showDetails({{ $guaranteeForm->id }})" data-target=".bd-example-modal-lg">جزییات</button>
                                            @if ($guaranteeForm->status != GuaranteeForm::STATUS_APPROVED_BY_CEO)
                                            <a onclick="setStatus({{ $guaranteeForm->id }})" class="btn btn-info btn-xs mr-2 text-white">ثبت وضعیت</a>
                                            @else
                                            @endif
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
    </div>
    <div class="modal fade" tabindex="-1" id="Modal">

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
        function showDetails(guaranteeForm)
        {
            $("#Modal").html()

            $.ajax({
                url: '{{ route('accounting.guaranteeForm.details', '+guaranteeForm+') }}'.replace('+guaranteeForm+', guaranteeForm),
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $("#Modal").html(data.html)
                    $("#Modal").modal('show')
                },
                error: function(reject) {

                }
            });
        }
        function setStatus(guaranteeForm)
        {
            $("#Modal").html()

            $.ajax({
                url: '{{ route('guaranteeFormList.setStatus', '+guaranteeForm+') }}'.replace('+guaranteeForm+', guaranteeForm),
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $("#Modal").html(data.html)
                    $("#Modal").modal('show')
                },
                error: function(reject) {

                }
            });
        }
    </script>
@endsection
