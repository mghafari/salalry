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
<div class="row">
    <div class="col-xl-4 col-lg-4 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">برق مصرفی کل کارخانه</h4>
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
                    <form method="post" action="{{ route('allelectricuse.store') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label></label>
                                <select name="term" class="form-control" required>
                                    <option value=""> دوره</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>


                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label></label>
                                <select name="year" class="form-control" required>
                                    <option value=""> سال</option>
                                    <option value="1395">1395</option>
                                    <option value="1396">1396</option>
                                    <option value="1397">1397</option>
                                    <option value="1398">1398</option>
                                    <option value="1399">1399</option>
                                    <option value="1400">1400</option>
                                    <option value="1401">1401</option>



                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label></label>
                                <select name="type_id" class="form-control" required>
                                    <option value="">انتخاب نوع</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach



                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>مبلغ واحد مصرف پیک</label>
                                <input type="text" name="price_pik" @input='calprice()' v-model="price_pik"
                                    class="form-control" placeholder="مبلغ / ریال">
                            </div>
                            <div class="form-group col-md-6">
                                <label>مقدار مصرف پیک</label>
                                <input type="text" name="amount_pik" @input='calprice()' v-model="amount_pik"
                                    class="form-control" placeholder="مقدار / کیلووات">
                            </div>
                            <div class="form-group col-md-6">
                                <label>مبلغ واحد مصرف میان باری</label>
                                <input type="text" name="price_mid" @input='calprice()' v-model="price_mid"
                                    class="form-control" placeholder="مبلغ / ریال">
                            </div>
                            <div class="form-group col-md-6">
                                <label>مقدار مصرف میان باری</label>
                                <input type="text" name="amount_mid" @input='calprice()' v-model="amount_mid"
                                    class="form-control" placeholder="مقدار / کیلووات">
                            </div>

                            <div class="form-group col-md-6">
                                <label>مبلغ واحد مصرف کم باری</label>
                                <input type="text" name="price_low" @input='calprice()' v-model="price_low"
                                    class="form-control" placeholder="مبلغ / ریال">
                            </div>
                            <div class="form-group col-md-6">
                                <label>مقدار مصرف کم باری</label>
                                <input type="text" name="amount_low" @input='calprice()' v-model="amount_low"
                                    class="form-control" placeholder="مقدار / کیلووات">
                            </div>
                            <div class="form-group col-md-6">
                                <label>مبلغ واحد مصرف جمعه</label>
                                <input type="text" name="price_friday" @input='calprice()' v-model="price_friday"
                                    class="form-control" placeholder="مبلغ / ریال">
                            </div>
                            <div class="form-group col-md-6">
                                <label>مقدار مصرف جمعه </label>
                                <input type="text" name="amount_friday" @input='calprice()' v-model="amount_friday"
                                    class="form-control" placeholder="مقدار / کیلووات">
                            </div>
                            <div class="form-group col-md-12">
                                <label>مبلغ کل</label>
                                <input type="text" name="price" style="color:red; font-size:20px; font-weight:bold"
                                    class="form-control" v-model='price'>
                            </div>
                            <div class="form-group col-md-12">
                                <label>مصرف کل</label>
                                <input type="text" name="amount" style="color:red; font-size:20px; font-weight:bold"
                                    class="form-control" v-model='amount'>
                            </div>




                        </div>



                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 ">






        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">مقادیر ثبت شده </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="display" style="width:100%">
                            <thead>
                                <tr>

                                    <th>سال </th>
                                    <th>دوره</th>
                                    <th>نوع </th>
                                    <th>پیک </th>
                                    <th>میان باری </th>
                                    <th>کم باری </th>
                                    <th>جمعه </th>
                                    <th>کل </th>
                                    <th>مبلغ </th>
                                    <th>عملیات </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUses as $all)
                                <tr>

                                    <td>{{ $all->year }}</td>
                                    <td>{{ $all->term }}</td>
                                    <td>{{ $all->type->name }}</td>
                                    <td>{{ number_format($all->amount_pik) }}</td>
                                    <td>{{ number_format($all->amount_mid) }}</td>
                                    <td>{{ number_format($all->amount_low) }}</td>
                                    <td>{{ number_format($all->amount_friday) }}</td>

                                    <td>{{ number_format($all->amount) }}</td>
                                    <td>{{ number_format($all->price) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('allelectricuse.edit', $all) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                    class="fa fa-pencil"></i></a>
                                            <form action="{{ route('allelectricuse.delete', $all) }}" method="post"
                                                onsubmit="return ConfirmDelete()">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                                </button>
                                            </form>
                                        </div>
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