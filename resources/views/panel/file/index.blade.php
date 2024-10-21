@extends('panel.main')
@section('body')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>فایل ها </h4>

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
                        <h4 class="card-title">لیست فایل ها </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                <tr>

                                    <th>نام</th>

                                    <th>سال</th>
                                    <th>ماه</th>
                                    <th>خالص پرداختی</th>


                                    <th>تاریخ بارگذاری</th>
                                    <th></th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $form)

                                    <tr>



                                        <td>
                                            {{$form->name .' '.$form->family}}
                                        </td>
                                        <td>
                                            {{$form->year}}
                                        </td>
                                        <td>
                                            {{$form->month}}
                                        </td>
 <td>
                                            {{number_format($form->khalesepardakhti ?? 0)}}
                                        </td>


                                        <td>{{verta($form->created_at)->formatJalaliDate()}}</td>
                                        @include('panel.layouts.download')


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
