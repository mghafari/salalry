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
                    <h4 class="card-title">افزودن فایل جدید</h4>
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
                        <form method="post" action="{{route('file.import')}}" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group col-md-6">
                                    <label>ماه  </label>
                                    <select name="month" class="form-control" required>

                                        <option value="">ماه را انتخاب نمایید </option>
                                        @for($i=1 ; $i<13 ; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                            @endfor



                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>سال  </label>
                                    <select name="year" class="form-control" required>

                                        <option value="">سال را انتخاب نمایید </option>

                                            <option value="1401">1401</option>
                                            <option value="1402">1402</option>
                                            <option value="1403">1403</option>




                                    </select>
                                </div>





                                <div class="form-group col-md-12">
                                    <label>انتخاب فایل  </label>
                                <input type="file" name="file">
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
