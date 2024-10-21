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


        <div class="col-xl-12 col-lg-12 ">


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
