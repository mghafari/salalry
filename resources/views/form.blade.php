@extends('main')
@section('body')
<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>سلام، خوش آمدید</h4>
                            <span>عناصر</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">فرم </a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">عناصر </a></li>
                        </ol>
                    </div>
                </div>
<div class="col-xl-6 col-lg-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">فرم افقی</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>نام اصلی</label>
                                                <input type="text" class="form-control" placeholder="جعفر خان">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>ایمیل</label>
                                                <input type="email" class="form-control" placeholder="ایمیل">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>رمز عبور</label>
                                                <input type="password" class="form-control" placeholder="رمز عبور">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>شهر</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>منطقه</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>انتخاب ...</option>
                                                    <option>گزینه 1</option>
                                                    <option>گزینه 2</option>
                                                    <option>گزینه 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>کد پستی</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    من را بررسی کنید
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">ورود</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
@endsection