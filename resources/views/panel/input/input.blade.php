@extends('panel.main')
@section('body')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ session('success') }}
        </div>
    @endif

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>ارسال پیام</h4>

            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">

            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ارسال  پیام  جدید</h4>
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
                        <form method="post" action="{{route('input.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>عنوان پیام  </label>
                                    <input type="text" name="title"
                                           class="form-control" placeholder="" required>
                                </div>








                                <div class="form-group col-md-12">
                                    <label>توضیحات  </label>
                                    <textarea class="form-control" name="body"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>انتخاب فایل  </label>
                                <input type="file" name="file[]" multiple>
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
@endsection
