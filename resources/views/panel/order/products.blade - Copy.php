@extends('panel.main')
@section('body')







    <div class="row">
        @include('panel.layouts.buttonpanel')


        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
            <div class="card " style="height: auto">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title">لیست کالاها</h4>

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
            <div class="card margin-bottom-50">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title">لیست کالاها</h4>

                </div>

                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-responsive-sm mb-0 table-bordered">
                            <thead>
                            <tr>

                                <th style="width: 100px"></th>
                                <th><strong>کد کالا </strong></th>
                                <th><strong>نام  </strong></th>




                                <th><strong>سفارش</strong></th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>

                                    <td><img src="{{$product->photo()}}" width="100px" height="100px"
                                             align="center"></td>


                                    <td>{{$product->id}}</td>
                                    <td>{{ $product->title}}
                                        <br>

                                        <span style="margin:10px ; color:red">  برند: {{$product->detail->brand->title ?? ''}}</span>

                                        <span style="margin:10px ; color:darkgreen">

                                        دسته: {{$product->detail->cat->title ?? ''}}
                                        </span>
                                        <span style="margin:10px ; color:darkblue">
                                        خودرو: {{$product->detail->car->title ?? ''}}
                                        </span>
                                    </td>
                                    <form method="post" action="{{route('product.update' ,$product)}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')






                                        <td>


                                            <button type="submit" class="btn btn-info">ذخیره</button>
                                        </td>

                                    </form>


                                </tr>


                            @endforeach

                            </tbody>
                        </table>
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
                                                <div class="new-arrival-content position-relative">
                                                    <h4>{{$product->title}}</h4>
                                                    <p class="price"> {{number_format($product->price)}} ريال</p>

                                                    <p>کد محصول:<span class="item">{{$product->code}}</span> </p>
                                                    <p>برند: <span class="item">{{$product->detail->brand->title}}</span></p>
                                                    <p>دسته بندی : <span class="item">{{$product->detail->cat->title}}</span></p>
                                                    <p>خودرو: <span class="item">{{$product->detail->car->title}}</span></p>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>




                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="images/product/2.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <h4>تی شرت تیره یقه گرد زنانه</h4>
                                                    <p class="price">39000 تومان</p>
                                                    <p>دسترسی: <span class="item"> در انبار <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>کد محصول:<span class="item">0405689</span> </p>
                                                    <p>برند: <span class="item">لی</span></p>
                                                    <p class="text-content">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                                                    <div class="comment-review star-rating text-right">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-half-empty"></i></li>
                                                            <li><i class="fa fa-star-half-empty"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 نظر ) / </span><a class="product-review" href="#">نظری دارید؟</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="images/product/3.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <h4>تی شرت تیره یقه گرد زنانه</h4>
                                                    <p class="price">29000 تومان</p>
                                                    <p>دسترسی: <span class="item"> در انبار <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>کد محصول:<span class="item">0405689</span> </p>
                                                    <p>برند: <span class="item">لی</span></p>
                                                    <p class="text-content">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                                                    <div class="comment-review star-rating text-right">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-half-empty"></i></li>
                                                            <li><i class="fa fa-star-half-empty"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 نظر ) / </span><a class="product-review" href="#">نظری دارید؟</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="images/product/4.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <h4>تی شرت تیره یقه گرد زنانه</h4>
                                                    <p class="price">59000 تومان</p>
                                                    <p>دسترسی: <span class="item"> در انبار <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>کد محصول:<span class="item">0405689</span> </p>
                                                    <p>برند: <span class="item">لی</span></p>
                                                    <p class="text-content">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                                                    <div class="comment-review star-rating text-right">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 نظر ) / </span><a class="product-review" href="#">نظری دارید؟</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="images/product/5.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <h4>تی شرت تیره یقه گرد زنانه</h4>
                                                    <p class="price">49000 تومان</p>
                                                    <p>دسترسی: <span class="item"> در انبار <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>کد محصول:<span class="item">0405689</span> </p>
                                                    <p>برند: <span class="item">لی</span></p>
                                                    <p class="text-content">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                                                    <div class="comment-review star-rating text-right">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 نظر ) / </span><a class="product-review" href="#">نظری دارید؟</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="images/product/6.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <h4>تی شرت تیره یقه گرد زنانه</h4>
                                                    <p class="price">29000 تومان</p>
                                                    <p>دسترسی: <span class="item"> در انبار <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>کد محصول:<span class="item">0405689</span> </p>
                                                    <p>برند: <span class="item">لی</span></p>
                                                    <p class="text-content">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                                                    <div class="comment-review star-rating text-right">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 نظر ) / </span><a class="product-review" href="#">نظری دارید؟</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="images/product/7.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <h4>تی شرت تیره یقه گرد زنانه</h4>
                                                    <p class="price">9000 تومان</p>
                                                    <p>دسترسی: <span class="item"> در انبار <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>کد محصول:<span class="item">0405689</span> </p>
                                                    <p>برند: <span class="item">لی</span></p>
                                                    <p class="text-content">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                                                    <div class="comment-review star-rating text-right">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 نظر ) / </span><a class="product-review" href="#">نظری دارید؟</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





@endsection
