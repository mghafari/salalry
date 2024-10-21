@extends('panel.main')
@section('body')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{$input->user->name}}</h4>

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

                </div>

                <div class="card-body" id="app">
                    <div class="basic-form">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>عنوان پیام  </label>
                                    <input type="text" name="title"
                                           class="form-control" placeholder="" value="{{$input->title ?? ''}}">
                                </div>








                                <div class="form-group col-md-12">
                                    <label>توضیحات  </label>
                                    <textarea class="form-control" name="body">{{$input->body ?? " "}}</textarea>
                                </div>
                                <div>
                                    @foreach($input->file as $index=>$file)
                                        <a href="{{route('input.file.download' , $file)}}">
                                        <button class="btn btn-primary"> دانلود فابل {{$index+1}}</button>
                                        </a>

                                        @endforeach
                                </div>




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
