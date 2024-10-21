
@extends('panel.layout')

@section('body')






    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                @include('panel.buttonpanel')
                <div class="col-xl-9 col-xxl-12">
                    <div class="row">


                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                            <div class="card margin-bottom-50">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title">لیست کالاها</h4>
                                </div>
                                <div class="card-body">
                                    <form >
                                        <input name="image[]" class="form-control" type="file">
                                        <button class="btn btn-success">آپلود گروهی تصاویر</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
