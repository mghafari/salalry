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
        <div class="col-xl-6 col-lg-6 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">برق مصرفی بخش های کارخانه</h4>
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
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{ route('detailelectricuse.update', $detailElectricUse) }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label></label>
                                    <select name="term" class="form-control" required>
                                        <option value="">انتخاب دوره</option>
                                        @for ($i = 1; $i < 13; $i++)
                                            <option value={{ $i }}
                                                @if ($detailElectricUse->term == $i) selected @endif>{{ $i }}
                                            </option>
                                        @endfor




                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label></label>
                                    <select name="year" class="form-control" required>
                                        <option value="">انتخاب سال</option>
                                        @for ($i = 1395; $i < 1402; $i++)
                                            <option value={{ $i }}
                                                @if ($detailElectricUse->year == $i) selected @endif>{{ $i }}
                                            </option>
                                        @endfor




                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label></label>
                                    <select name="unit_id" id="unit" class="form-control" required>
                                        <option value="">انتخاب بخش</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                @if ($detailElectricUse->unit_id == $unit->id) selected @endif>{{ $unit->name }}
                                            </option>
                                        @endforeach



                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label></label>
                                    <select name="departement_id" id="departememt" class="form-control" required>
                                        @foreach ($deps as $dep)
                                            <option value="{{ $dep->id }}"
                                                @if ($dep->id == $detailElectricUse->departement_id) selected @endif>{{ $dep->name }}
                                            </option>
                                        @endforeach

                                        <div>
                                        </div>





                                    </select>
                                </div>

                                <div class="form-group col-md-6">

                                    <input type="text" name="amount" value="{{ $detailElectricUse->amount }}"
                                        class="form-control" placeholder="مقدار / کیلووات">
                                </div>

                            </div>



                            <button type="submit" class="btn btn-danger">ویرایش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 ">






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
                                        <th>بخش </th>
                                        <th>دپارتمان</th>
                                        <th>مبلغ </th>
                                        <th>عملیات </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>

                                            <td>{{ $detail->year }}</td>
                                            <td>{{ $detail->term }}</td>
                                            <td>{{ $detail->unit->name }}</td>
                                            <td>{{ $detail->departement->name }}</td>
                                            <td>{{ number_format($detail->amount) }}</td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('detailelectricuse.edit', $detail) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <form action="{{ route('detailelectricuse.delete', $detail) }}"
                                                        method="post" onsubmit="return ConfirmDelete()">
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
                                <tfoot>
                                    <tr>
                                        <th>سال </th>
                                        <th>دوره</th>
                                        <th>نوع </th>
                                        <th>مقدار </th>
                                        <th>مبلغ </th>
                                    </tr>
                                </tfoot>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script>
        $('#unit').change(function() {
            var id = $(this).find('option:selected').val();


            $.ajax({
                method: 'get',
                url: "{{ url('/getdepartememt') }}",

                data: {
                    id: id
                },

                success: function(msg) {

                    $('#departememt').html(msg);

                }
            });
        });
    </script>



@endsection
