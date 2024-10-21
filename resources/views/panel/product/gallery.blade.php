
@extends('panel.layout')

@section('body')






    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                @include('panel.buttonpanel')
                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
                            <div class="card margin-bottom-50">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title">آپلود  تصویر </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('product.image.gallery.store',$product)}}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="col-md-9">
                                            <input type="file" name="image" class="form-control"  required>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-success">آپلود</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
                            <div class="card margin-bottom-50">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title">توضیحات محصول </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('product.comment.store',$product)}}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="col-md-12">
                                           <textarea name="desc" class="form-control">{{$product->description}}</textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-success">بروزرسانی</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                        <div class="card margin-bottom-50">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">لیست تصاویر کد کالا {{$product->id}}</h4>

                            </div>

                            <div class="card-body">



                                <div class="table-responsive">
                                    <table class="table table-responsive-sm mb-0 table-bordered">
                                        <thead>
                                        <tr>

                                            <th><strong> </strong></th>




                                            <th><strong>حذف تصویر</strong></th>







                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->photo as $image)
                                            <tr>

                                                <td><img src="{{$image->url}}" width="400px" height="400px" align="center" ></td>









                                                <td>
                                                    <form action="{{route('product.image.gallery.destroy' ,$image)}}" method="post" >
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" class="btn btn-warning">حذف</button>
                                                    </form>
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




        </div>
    </div>
    </div>
@endsection
