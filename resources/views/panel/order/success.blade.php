
@extends('panel.main')
@section('body')

            <div class="row">


            </div>
            <div class="col-xl-3">
            </div>

            <div class="col-xl-6 offset-xl-3">
                <div class="card text-white bg-success">
                    <div class="card-header">
                        <h2 class="card-title text-white" style="font-size: 30px">سفارش شما  با موفقیت ثبت  گردید</h2>
                    </div>
                    <div class="card-body mb-0">

                        <a href="/" > <button class="btn btn-warning btn-sm">صفحه نخست </button> </a>
                        <a href="/" > <button class="btn btn-primary btn-sm">مشاهده فاکتورها  </button></a>
                        <a href="{{ route('logout') }}" > <button class="btn btn-danger btn-sm">خروج از سامانه </button></a>
                    </div>

                </div>
            </div>
            <div class="col-xl-3">
            </div>


@endsection
