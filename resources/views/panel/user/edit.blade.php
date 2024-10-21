@extends('panel.main')
@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>کاربران </h4>

            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">افزودن کاربر جدید</h4>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body" id="app">
                    <div class="basic-form">
                        <form method="post" action="{{route('user.update', $user)}}">
                            @csrf
                            <div class="form-row">








                                <div class="form-group col-md-6">
                                    <label>نام  </label>
                                    <input type="text" name="name" value="{{$user->name}}"
                                           class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>نام خانوادگی  </label>
                                    <input type="text" name="family" value="{{$user->family}}"
                                           class="form-control" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>کد ملی</label>
                                    <input type="text" name="national_code" value="{{$user->national_code}}"
                                           class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>کد پرسنلی</label>
                                    <input type="text" name="personal_code"
                                           class="form-control" placeholder="" value="{{$user->personal_code}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>موبایل </label>
                                    <input type="text" name="mobile"
                                           class="form-control" placeholder="" value="{{$user->mobile}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>شماره بیمه </label>
                                    <input type="text" name="ins_no"
                                           class="form-control" placeholder="" value="{{$user->ins_no}}" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>شماره حساب </label>
                                    <input type="text" name="account_no"
                                           class="form-control" placeholder=""  value="{{$user->account_no}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>وضعیت </label>
                                    <br>
                                    <input type="radio" name="status"
                                           @if($user->status) checked @endif value="1">  فعال
                                    <input type="radio" name="status"
                                           @if(!$user->status) checked @endif value="0"> غیر فعال
                                </div>







                            </div>



                            <button type="submit" class="btn btn-secondary">ویرایش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 ">






            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">مقادیر ثبت شده </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                <tr>

                                    <th>نام  </th>
                                    <th>پرسنلی </th>
                                    <th>کد ملی </th>

                                    <th>موبایل  </th>


                                    <th>ویرایش  </th>
                                    <th>حذف  </th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>

                                        <td>{{$user->name .' '. $user->family}}</td>
                                        <td>{{$user->personal_code}}</td>
                                        <td>{{$user->national_code}}</td>

                                        <td>{{$user->mobile}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <form action="{{route('user.edit' , $user)}}" method="get">

                                                    <button  type="submit" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-pencil"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <form action="{{route('user.delete' , $user)}}" method="post" onsubmit="return ConfirmDelete() ">
                                                    @method('delete')
                                                    @csrf
                                                    <button  type="submit" class="btn btn-danger shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-close"></i>
                                                    </button>
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
