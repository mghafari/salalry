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
        <div class="col-xl-4 col-lg-4 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ویرایش فایل</h4>
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
                        <form method="post" action="{{route('file.update' , $file)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>عنوان فایل </label>
                                    <input type="text" name="title" value="{{$file->file_name}}"
                                           class="form-control" placeholder="" required>
                                </div>


                                <div class="form-group col-md-12">
                                    <label> مشترک </label>
                                    <select name="user_id" class="form-control">

                                        <option value="">مشترک را انتخاب نمایید</option>
                                        <option value="0">عمومی</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" @if($file->user_id==$user->id)selected @endif>{{$user->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>ماه  </label>
                                    <select name="month" class="form-control" required>

                                        <option value="">ماه را انتخاب نمایید </option>
                                        @for($i=1 ; $i<13 ; $i++)
                                            <option value="{{$i}}" @if($file->month==$i)selected @endif>{{$i}}</option>
                                        @endfor



                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>سال  </label>
                                    <select name="year" class="form-control" required>

                                        <option value="">سال را انتخاب نمایید </option>

                                        <option value="1401"@if($file->year=='1401')selected @endif>1401</option>
                                        <option value="1402" @if($file->year=='1402')selected @endif>1402</option>




                                    </select>
                                </div>




                                <div class="form-group col-md-12">
                                    <label>توضیحات  </label>
                                    <textarea class="form-control" name="desc">{{$file->description}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>انتخاب فایل  </label>
                                    <input type="file" name="file">
                                </div>



                            </div>


                            <button type="submit" class="btn btn-primary">ثبت</button>
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

                                    <th>نام مشترک</th>

                                    <th>عنوان</th>
                                    <th>توضیحات </th>
                                    <th>سال  </th>
                                    <th>ماه  </th>

                                    <th>تاریخ ثبت</th>

                                    <th>دانلود</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)

                                    <tr>

                                        <td>
                                            @if($file->user_id==0)
                                                عمومی
                                            @else
                                                {{$file->user->name}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$file->file_name}}
                                        </td>
                                        <td>
                                            {{$file->description}}
                                        </td>
                                        <td>
                                            {{$file->month}}
                                        </td>
                                        <td>
                                            {{$file->year}}
                                        </td>


                                        <td>{{verta($file->created_at)->formatJalaliDate()}}</td>
                                        @include('panel.layouts.download')
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('file.edit', $file)}}"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{route('file.destroy', $file)}}"  method="post" onsubmit="return ConfirmDelete()">
                                                    @method('delete')
                                                    @csrf
                                                    <button  class="btn btn-warning shadow btn-xs sharp mr-1" onsubmit="ConfirmDelete()"><i
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
