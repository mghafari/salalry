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

                        <div class="form-row">


                            <form class="row gy-6 gx-6 align-items-center" action="{{route('admin.fish.show')}}" method="get">

                                <div class="col-md-6">
                                    <select class="form-control" name="month">
                                        <option value="">ماه</option>

                                    @for($i=1 ; $i<13 ; $i++)
                                            <option value="{{$i}}">{{$i}}</option>

                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">

                                    <select class="form-control" name="year">
                                        <option value="">سال</option>

                                    @for($i=1400 ; $i<1404; $i++)
                                            <option value="{{$i}}">{{$i}}</option>

                                        @endfor
                                    </select>
                                </div>
                                <button class="btn btn-success">فیلتر</button>

                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                <tr>

                                    <th>id</th>
                                    <th>نام </th>

                                    <th>سال </th>
                                    <th>ماه </th>
                                    {{--  <th>خالص پرداختی</th>  --}}

                                    <th>تاریخ بارگذاری</th>

                                    <th>مشاهده</th>

                                    <th>حذف</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payslipHeadImports as $payslipHeadImport)

                                    <tr>
                                        <td>{{$payslipHeadImport->id}}</td>


                                        <td>
                                            {{$payslipHeadImport->user->name()}}
                                        </td>

                                        <td>
                                            {{$payslipHeadImport->year}}
                                        </td>
                                        <td>
                                            {{$payslipHeadImport->month}}

                                        </td>

                                        {{--  <td>{{number_format($payslipHeadImport->khalesepardakhti ?? 0)}}</td>  --}}

                                        <td>{{verta($payslipHeadImport->created_at)->formatJalaliDate()}}</td>
                                        @include('panel.layouts.download')

                                        <td>
                                            <div class="d-flex">
                                                <form action="{{route('form.destroy', $payslipHeadImport)}}" method="post"
                                                      onsubmit="return ConfirmDelete()">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-warning shadow btn-xs sharp mr-1"
                                                            onsubmit="ConfirmDelete()"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>

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
