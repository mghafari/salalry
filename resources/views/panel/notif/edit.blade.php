@extends('panel.main')
@section('body')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>پیام ها </h4>

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
                    <h4 class="card-title">افزودن پیام جدید</h4>
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
                        <form method="post" action="{{route('notif.update' , $notif)}}">
                            @csrf
                            <div class="form-row">


                                <div class="form-group col-md-6">
                                    <label> مشترک </label>
                                    <select name="user_id" class="form-control">

                                        <option value="">مشترک را انتخاب نمایید</option>
                                        <option value="0">عمومی</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" @if($user->id==$notif->user_id) selected @endif>{{$user->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>نوع پیام </label>
                                    <select name="type" class="form-control" required>

                                        <option value="">نوع پیام را انتخاب نمایید</option>
                                        <option value="alert-primary" @if($notif->type=="alert-primary") selected @endif>اطلاع رسانی</option>
                                        <option value="alert-warning" @if($notif->type=="alert-warning") selected @endif>هشدار</option>
                                        <option value="alert-danger" @if($notif->type=="alert-danger") selected @endif>اخطار</option>


                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <label>عنوان پیام </label>
                                    <input type="text" name="title"
                                           class="form-control" placeholder="" required value="{{$notif->title}}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>متن پیام </label>
                                    <textarea class="form-control" name="body">{{$notif->body}}"</textarea>
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
                                    <th>نوع پیام</th>
                                    <th>عنوان</th>
                                    <th>متن</th>

                                    <th>تاریخ ثبت</th>

                                    <th>ویرایش</th>
                                    <th>حذف</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notifs as $notif)

                                    <tr>

                                        <td>
                                            @if($notif->user_id==0)
                                                عمومی
                                            @else
                                                {{$notif->user->name}}
                                            @endif
                                        </td>
                                        <td>@if($notif->type=='alert-warning')
                                                هشدار
                                            @endif
                                            @if($notif->type=='alert-danger')
                                                اخطار
                                            @endif
                                            @if($notif->type=='alert-primary')
                                                اطلاع رسانی
                                            @endif
                                        </td>
                                        <td>{{$notif->title}}</td>

                                        <td>{{$notif->body}}</td>
                                        <td>{{verta($notif->created_at)->formatJalaliDate()}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('notif.edit', $notif)}}"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{route('notif.destroy', $notif)}}"  method="post" onsubmit="return ConfirmDelete()">
                                                    @method('delete')
                                                  <button  class="btn btn-warning shadow btn-xs sharp mr-1"><i
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
