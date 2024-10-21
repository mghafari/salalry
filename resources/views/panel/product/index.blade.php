
@extends('panel.main')
@section('body')







            <div class="row">
                @include('panel.layouts.buttonpanel')


                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                            <div class="card margin-bottom-50">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title">لیست کالاها</h4>

                                </div>

                                <div class="card-body">

                                        <form action="{{route('product.index')}}"  method="get">
                                            <div class="col-md-3" style="display: inline-flex">
                                                <input name="search" type="text" class="form-control" style="margin: 5px" value="{{$name}}" placeholder="نام و یا کد کالا را وارد نمایید">
                                                <button class="btn btn-success" style="margin: 5px">جستجو</button>
                                            </div>




                                        </form>

                                    <div class="table-responsive">
                                        <table class="table table-responsive-sm mb-0 table-bordered">
                                            <thead>
                                            <tr>

                                                <th><strong> </strong></th>
                                                <th><strong>کد کالا </strong></th>
                                                <th ><strong>شرح کالا  </strong></th>
                                                <th><strong>دسته بندی</strong></th>
                                                <th><strong>خودرو</strong></th>
                                                <th><strong>برند</strong></th>
                                                <th><strong>افرزودن تصویر</strong></th>


                                                <th><strong>ذخیره</strong></th>







                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>

                                                    <td><img src="{{$product->photo() ?? ''}}" width="100px" height="100px" align="center" ></td>




                                                    <td>{{$product->id}}</td>
                                                    <td>{{ $product->title}}</td>
                                                    <form method="post" action="{{route('product.update' ,$product)}}" enctype="multipart/form-data" >
                                                        @csrf
                                                        @method('patch')

                                                    <td>
                                                        <select name="cat_id" class="form-control" required >
                                                            <option value="">انتخاب دسته بندی</option>
                                                        @foreach($cats as $cat)
                                                                <option value="{{$cat->id}}"  @if(isset($product->detail->cat_id))   @if($product->detail->cat_id== $cat->id) selected @endif @endif>{{$cat->title}}</option>




                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="car_id" class="form-control" >
                                                            <option value="">انتخاب خودرو</option>
                                                        @foreach($cars as $car)
                                                                <option value="{{$car->id}}"  @if(isset($product->detail->car_id))    @if($product->detail->car_id== $car->id) selected @endif  @endif>{{$car->title}}</option>




                                                            @endforeach
                                                        </select>
                                                    </td>
  <td>
                                                        <select name="brand_id" class="form-control" >
                                                            <option value="">انتخاب برند</option>
                                                        @foreach($brands as $brand)

                                                                <option value="{{$brand->id}}"  @if(isset($product->detail->brand_id))    @if($product->detail->brand_id== $brand->id) selected @endif  @endif>{{$brand->title}}</option>




                                                            @endforeach
                                                        </select>
                                                    </td>



                                                    <td>


                                                            <input type="file" name="image" class="form-control" >


                                                    </td>

                                                    <td>




                                                            <button type="submit" class="btn btn-info">ذخیره</button>
                                                    </td>

                                                    </form>









                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





@endsection
