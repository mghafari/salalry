extends('panel.main')
@section('body')

    <div class="row">
        @if(count($notifs) >0)

        <div class="col-xl-12 col-lg-12 ">


            <div class="card">

                <div class="card-body">
                    @foreach($notifs as $notif)
                        <div class="alert {{$notif->type}}" role="alert">
                            <h4>
                                {{$notif->title}}
                                <h4>
                            {{$notif->body}}

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        @endif


        <div class="col-xl-12 col-lg-12 ">
            @can('admin')
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                       آخرین پیام ها
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
                                @foreach($messages as $message)
                                    @if($message->seen==0)
                                        <tr style="background: #d3cfcd87">
                                    @else
                                        <tr>
                                            @endif

                                            <td>

                                                {{$message->user->name}}

                                            </td>
                                            <td>
                                                {{$message->title}}
                                            </td>
                                            <td>
                                                {{$message->body}}
                                            </td>


                                            <td>{{verta($message->created_at)->formatJalaliDate()}}</td>


                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{route('input.show', $message)}}" method="get"
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

                </div>
            </div>
            @endcan


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">آخرین فایل ها </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">

                            @can('admin')
                                <form class="row gy-2 gx-3 align-items-center" action="{{route('panel')}}" method="get">
                                    <div class="col-5 ">
                                        <select class="form-control" name="user">
                                            <option value="">انتخاب کاربر</option>
                                            <option value="0">عمومی</option>
                                            @foreach($users as $user)

                                                <option value="{{$user->id}}">{{$user->name}}

                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="month">
                                            <option value="">ماه</option>

                                            @for($i=1 ; $i<13 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>

                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3">

                                        <select class="form-control" name="year">
                                            <option value="">سال</option>

                                            @for($i=1397 ; $i<1403; $i++)
                                                <option value="{{$i}}">{{$i}}</option>

                                            @endfor
                                        </select>
                                    </div>
                                    <button class="btn btn-success">فیلتر</button>

                                </form>
                            @endcan

                            @can('user')
                                <form class="row gy-4 gx-5 align-items-center" action="{{route('panel')}}" method="get">

                                    <div class="col-md-5">
                                        <select class="form-control" name="month">
                                            <option value="">ماه</option>

                                            @for($i=1 ; $i<13 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>

                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-5">

                                        <select class="form-control" name="year">
                                            <option value="">سال</option>

                                            @for($i=1397 ; $i<1403; $i++)
                                                <option value="{{$i}}">{{$i}}</option>

                                            @endfor
                                        </select>
                                    </div>
                                    <button class="btn btn-success">فیلتر</button>

                                </form>
                            @endcan
                        </div>

                        <table class="table table-striped table-responsive"  style="width:100%">
                            <thead>
                            <tr>


                                <th>مشترک</th>
                                <th>عنوان</th>
                                <th>توضیحات</th>

                                <th>ماه</th>
                                <th>سال</th>

                                <th>تاریخ ثبت</th>
                                <th>دانلود</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)

                                <tr>


                                    <td>
                                        @if($file->user_id == 0)

                                            عمومی
                                        @else
                                            {{$file->user->name }}
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


                                    <td>
                                        <div class="d-flex">
                                            @if($file->new==1)
                                                <form method="get" action="{{route('file.show', $file)}}">
                                                    <button class="btn btn-success shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-download"></i></button>
                                                </form>
                                            @else
                                                <a href="{{$file->link}}">
                                                    <button class="btn btn-success shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-download"></i></button>

                                                </a>

                                            @endif


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
