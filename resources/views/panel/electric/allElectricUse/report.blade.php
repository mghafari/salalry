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

        <div class="col-xl-12 col-lg-12  ">






            <div class="col-12">
                <div class="card" style="padding:20px">

                        <form method="get" action="{{ route('allelectricuse.report') }}">


                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <label>از دوره</label>
                                    <select name="fromterm" class="form-control" required>
                                        <option value=""> دوره</option>
                                        @for ($i = 1; $i < 13; $i++)
                                            <option value={{ $i }}
                                                @if ($request->fromterm == $i) selected @endif>{{ $i }}


                                            </option>
                                        @endfor




                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>از سال</label>
                                    <select name="fromyear" class="form-control" required>
                                        <option value=""> سال</option>
                                        @for ($i = 1395; $i < 1402; $i++)
                                            <option value={{ $i }}
                                                @if ($request->fromyear == $i) selected @endif>{{ $i }}
                                            </option>
                                        @endfor




                                    </select>
                                </div>

                                <div class="form-group col-md-1">
                                    <label>تا دوره</label>
                                    <select name="toterm" class="form-control" required>
                                        <option value=""> دوره</option>
                                        @for ($i = 1; $i < 13; $i++)
                                            <option value={{ $i }}
                                                @if ($request->toterm == $i) selected @endif>{{ $i }}
                                            </option>
                                        @endfor




                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>تا سال</label>
                                    <select name="toyear" class="form-control" required>
                                        <option value=""> سال</option>
                                        @for ($i = 1395; $i < 1402; $i++)
                                            <option value={{ $i }}
                                                @if ($request->toyear == $i) selected @endif>{{ $i }}
                                            </option>
                                        @endfor




                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>انتخاب نوع</label>
                                    <select name="type_id" class="form-control" required>
                                        <option value="all">همه</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                @if ($request->type_id == $type->id) selected @endif>{{ $type->name }}
                                            </option>
                                        @endforeach



                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label> </label>
                                    <button type="submit" class="btn btn-success" style="    margin-top: 27px;">
                                        تایید</button>
                                         <a href="{{route('allelectricuse.report')}}">

                                    <button type="button" class="btn btn-success" style="    margin-top: 27px;">
                                        بازنشانی</button>
                                    </a>
                                </div>





                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>

                                                <th>سال </th>
                                                <th>دوره</th>
                                                <th>نوع </th>
                                                <th> مصرف پیک </th>
                                                <th> قیمت پیک </th>
                                                <th>مصرف میان باری </th>
                                                <th>قیمت میان باری </th>
                                                <th>مصرف کم باری </th>
                                                <th>قیمت کم باری </th>
                                                <th>مصرف جمعه </th>
                                                <th>قیمت جمعه </th>
                                                <th>کل مصرف</th>
                                                <th>مبلغ کل</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allElectricUses as $all)
                                                <tr>

                                                    <td>{{ $all->year }}</td>
                                                    <td>{{ $all->term }}</td>
                                                    <td>{{ $all->type->name }}</td>
                                                    <td>{{ number_format($all->amount_pik) }}
                                                        @php  $amount_pik += $all->amount_pik @endphp
                                                    </td>
                                                    <td>{{ number_format($all->price_pik) }}

                                                    </td>
                                                    <td>{{ number_format($all->amount_mid) }}
                                                        @php  $amount_mid += $all->amount_mid @endphp
                                                    </td>
                                                    <td>{{ number_format($all->price_mid) }}

                                                    </td>
                                                    <td>{{ number_format($all->amount_low) }}
                                                        @php  $amount_low +=$all->amount_low @endphp
                                                    </td>
                                                    <td>{{ number_format($all->price_low) }}
                                                        @php  $amount_pik @endphp
                                                    </td>
                                                    <td>{{ number_format($all->amount_friday) }}
                                                        @php  $amount_friday+= $all->amount_friday @endphp
                                                    </td>
                                                    <td>{{ number_format($all->price_friday) }}

                                                    </td>

                                                    <td>{{ number_format($all->amount) }}
                                                        @php $amount+=$all->amount  @endphp
                                                    </td>
                                                    <td>{{ number_format($all->price) }}
                                                        @php  $price+= $all->price @endphp
                                                    </td>




                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                    <table style="width:100% ;color:red;font-size:16px">
                                        <tbody>
                                            <rt style="font-size: 30px ; color:red">

                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td> مجموع مصرف پیک:
                                                    {{ number_format($amount_pik) }}


                                                </td>
                                                <td>
                                                </td>
                                                <td>



                                                    مجموع مصرف میان باری:
                                                    {{ number_format($amount_mid) }}


                                                </td>

                                                <td>
                                                </td>
                                                <td> مجموع مصرف کم باری:
                                                    {{ number_format($amount_low) }}

                                                </td>
                                                <td>
                                                </td>
                                                <td> مجموع مصرف جمعه:
                                                    {{ number_format($amount_friday) }}

                                                </td>
                                                <td>
                                                </td>

                                                <td> کل مصرف :
                                                    {{ number_format($amount) }}

                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    کل هزینه:
                                                    {{ number_format($price) }}


                                                </td>



                                            </rt>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                    </div>

       
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">نمودار مصرف کل</h4>
                </div>
                <div class="card-body">
                    <canvas id="totalUseChart"></canvas>
                </div>
            </div>
        </div>

         <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">نمودار هزینه کل</h4>
                </div>
                <div class="card-body">
               <canvas id="chart2"></canvas>

                </div>
            </div>
        </div>



        <div class="card-header">
            <div class="card-body">


                <div class="ct-chart ct-perfect-fourth"></div>


            </div>
        </div>
    </div>
    </div>



    <script>
        const labels = [
            @foreach ($labels as $l)
                '{{ $l }}',
            @endforeach
        ]




        const data = {
            labels: labels,
            datasets: [{
                    label: 'مجموع',
                    backgroundColor:  'rgba(255, 99, 132, 0.7)',
                    borderColor:  'rgba(255, 99, 132, 1)',
                    data: [
                        @foreach ($totals as $l)
                            {{ intval($l) }},
                        @endforeach
                    ],

                },
                {
                    label: 'کم باری ',
                    backgroundColor: 'rgba(255, 206, 86, 0.7)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    data: [
                        @foreach ($lows as $low)
                            {{ intval($low) }},
                        @endforeach
                    ],

                },
                {
                    label: 'پیک ',
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: [
                        @foreach ($piks as $pik)
                            {{ intval($pik) }},
                        @endforeach
                    ],

                },
                {
                    label: 'میان باری ',
                    backgroundColor:  'rgba(153, 102, 255, 0.7)',
                    borderColor:  'rgba(153, 102, 255, 1)',
                    data: [
                        @foreach ($mids as $mid)
                            {{ intval($mid) }},
                        @endforeach
                    ],

                },
                 {
                    label: 'جمعه  ',
                    backgroundColor:  'rgba(255, 159, 64, 0.7)',
                    borderColor:  'rgba(255, 159, 64, 1)',
                    data: [
                        @foreach ($fridays as $friday)
                            {{ intval($friday) }},
                        @endforeach
                    ],

                }

            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
    </script>

    <script>
        const myChart = new Chart(
            document.getElementById('totalUseChart'),
            config
        );
    </script>




















<script>
        const labels2 = [
            @foreach ($labels as $l)
                '{{ $l }}',
            @endforeach
        ]




        const data2= {
            labels: labels2,
            datasets: [{
                    label: 'مجموع',
                    backgroundColor:  'rgba(255, 99, 132, 0.7)',
                    borderColor:  'rgba(255, 99, 132, 1)',
                    data: [
                        @foreach ($prices as $l)
                            {{ intval($l) }},
                        @endforeach
                    ],

                },
                {
                    label: 'کم باری ',
                    backgroundColor: 'rgba(255, 206, 86, 0.7)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    data: [
                        @foreach ($priceLows as $low)
                            {{ intval($low) }},
                        @endforeach
                    ],

                },
                {
                    label: 'پیک ',
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: [
                        @foreach ($pricePiks as $pik)
                            {{ intval($pik) }},
                        @endforeach
                    ],

                },
                {
                    label: 'میان باری ',
                    backgroundColor:  'rgba(153, 102, 255, 0.7)',
                    borderColor:  'rgba(153, 102, 255, 1)',
                    data: [
                        @foreach ($priceMids as $mid)
                            {{ intval($mid) }},
                        @endforeach
                    ],

                },
                 {
                    label: 'جمعه  ',
                    backgroundColor:  'rgba(255, 159, 64, 0.7)',
                    borderColor:  'rgba(255, 159, 64, 1)',
                    data: [
                        @foreach ($priceFridays as $friday)
                            {{ intval($friday) }},
                        @endforeach
                    ],

                }

            ]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {}
        };
    </script>


 <script>
        const Chart2 = new Chart(
            document.getElementById('chart2'),
            config2
        );
    </script>















@endsection
