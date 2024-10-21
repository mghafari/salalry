@extends('panel.main')
@section('body')
    @include('panel.layouts.buttonpanel')


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 order-md-12 mb-12">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">سبد خرید شما</span>
                                <span class="badge badge-primary badge-pill">{{$head->count() }}</span>
                            </h4>
                            <ul class="list-group mb-3">
                                @if($head->get()->item != null )
                                @foreach( $head->get()->item as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{$item->product->title}}</h6>

                                    </div>
                                    <span class="text-muted">{{number_format($item->price)}}</span>





                                    <span >
                                        تعداد:
                                        <input class="form-control" type="number" style="max-width: 100px" value="{{$item->qty}}" >
                                         <span class="text-muted"></span>
                                    </span>

                                    <span >
                                        <form action="{{route('cart.item.destroy' , $item)}}"  method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="margin: 20px 10px 0px 0px "  >حذف </button>

                                        </form>
                                        </span>
                                </li>
                                @endforeach




                                <li class="list-group-item d-flex justify-content-between">
                                    <span>مجموع(تومان)</span>
                                    <strong>{{number_format($head->finalPrice())}}</strong>
                                </li>
                            </ul>


                        </div>
                        @else
                            <alert class="alert alert-info">هنوز محصولی به سبد خرید شما اضافه نشده است.</alert>
                        @endif

                    </div>
                    <form action="{{route('cart.approve' ,$cart)}}" method="post">
                        @csrf
                    <button class="btn btn-info" style="width:300px">نهایی کردن سفارش </button>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <div class="row">



        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
            <div class="card " style="height: auto">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title">جستجوی کالا</h4>

                </div>

                <div class="card-body">
                    <div class="">
                        <form class="form-row">
                            <div class="col-sm-12 col-xl-2 margin-bottom-15">

                                <input class="form-control" type="text" name="search" placeholder="نام کالا را جستجو کنید" value="{{$request->search}}">
                            </div>
                            <div class="col-sm-12 col-xl-2 margin-bottom-15">
                                <select name="car_id" class="form-control">
                                    <option value="">انتخاب خودرو</option>
                                    @foreach($cars as $car)
                                        <option value="{{$car->id}}"
                                                @if(isset($request->car_id))    @if($request->car_id== $car->id) selected @endif  @endif>{{$car->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-2 margin-bottom-15">
                                <select name="cat_id" class="form-control">
                                    <option value="">انتخاب دسته بندی</option>
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}"
                                                @if(isset($request->cat_id))    @if($request->cat_id== $cat->id) selected @endif  @endif>{{$cat->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-2 margin-bottom-15">
                                <select name="brand_id" class="form-control ">
                                    <option value="">انتخاب برند</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}"
                                                @if(isset($request->brand_id))    @if($request->brand_id== $brand->id) selected @endif  @endif>{{$brand->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 col-xl-1 margin-bottom-15">
                                <button type="submit" class="btn btn-success ">جستجو
                                </button>
                            </div>
                            <div class="col-sm-3 col-xl-1 margin-bottom-15">
                                <a href="{{route('order.products')}}">
                                    <button type="button" class="btn btn-info ">پاکسازی جستجو
                                    </button>
                                </a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>



                        <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="{{$product->photo()}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class=" position-relative">
                                                    <h4>{{$product->title}}</h4>
                                                    <p class="price"> {{number_format($product->price)}} ريال</p>

                                                    <p>کد محصول:<span class="item">{{$product->id}}</span> </p>
                                                    <p>برند: <span class="item">{{$product->detail->brand->title}}</span></p>
                                                    <p>دسته بندی : <span class="item">{{$product->detail->cat->title}}</span></p>
                                                    <p>خودرو: <span class="item">{{$product->detail->car->title}}</span></p>
                                                    <div class="comment-review star-rating text-right">
                                                        <form action="{{route('cart.add' , $product)}}" method="post">
                                                            @csrf


                                                        <button class="btn btn-info">سفارش کالا</button>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>





                        {{$products->links()}}
                    </div>
                </div>






@endsection
