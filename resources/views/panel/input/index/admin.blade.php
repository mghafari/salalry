@extends('panel.main')
@section('body')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>فایل های ارسالی </h4>

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


                            <form class="row gy-2 gx-3 align-items-center" action="{{route('input.admin.index')}}"
                                  method="get">
                                <div class="col-9 ">
                                    <select class="form-control" name="user_id">
                                        <option value="">انتخاب کاربر</option>

                                        @foreach($users as $user)

                                            <option value="{{$user->id}}">{{$user->name}}

                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <button class="btn btn-success">فیلتر</button>

                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table">
                            <table class="display" style="width:100%">
                                <thead>
                                <tr>

                                    <th>نام مشترک</th>

                                    <th>عنوان</th>
                                    <th>توضیحات</th>


                                    <th>تاریخ ثبت</th>


                                    <th>جزئیات</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    @if($file->seen==0)
                                        <tr style="background: #d3cfcd87">
                                    @else
                                        <tr>
                                            @endif

                                            <td>

                                                {{$file->user->name}}

                                            </td>
                                            <td>
                                                {{$file->title}}
                                            </td>
                                            <td>
                                                {{$file->body}}
                                            </td>


                                            <td>{{verta($file->created_at)->formatJalaliDate()}}</td>


                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{route('input.show', $file)}}" method="get"
                                                        >

                                                        <button class="btn btn-success shadow btn-xs sharp mr-1"
                                                        ><i
                                                                class="fa fa-pencil"></i></button>
                                                    </form>

                                                </div>
                                            </td>


                                        </tr>
                                        @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{$files->links()}}
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
