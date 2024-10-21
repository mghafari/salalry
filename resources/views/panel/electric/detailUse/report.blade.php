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
                <li class="breadcrumb-item"><a href="javascript:void(0)">گزارش  </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">مصرف </a></li>
            </ol>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-12 col-lg-12  ">






            <div class="col-12">
                <div class="card">

                        <form method="get" action="{{ route('detailelectricuse.report') }}">


                            <div class="form-row" style="padding: 20px">
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

                                <div class="form-group col-md-2">
                                    <label>انتخاب بخش</label>
                                    <select name="unit_id" id="unit" class="form-control" required>
                                        <option value="all">همه</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"  @if ($request->unit_id == $unit->id) selected @endif >{{ $unit->name }}</option>
                                        @endforeach



                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>انتخاب دپارتمان</label>
                                    <select name="dep_id" id="departememt" class="form-control" required>
                                        <option value="all">همه</option>
                                        @if(isset($deps))

                                        @foreach ($deps as  $dep)
                                       <option value="{{$dep->id}}" @if ($request->dep_id == $dep->id) selected @endif>{{$dep->name}}</option>

                                        @endforeach
                                        @endif

                                        <div>
                                        </div>





                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label> </label>
                                    <button type="submit" class="btn btn-success" style="    margin-top: 27px;">
                                        تایید</button>
                                        <a href="{{route('detailelectricuse.report')}}">

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
                                                <th>واحد </th>
                                                <th>  بخش </th>
                                                <th> مصرف کل  </th>
                                                <th> تولید کل  </th>
                                                <th> شاخص انرژی الکتریکی </th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detailElectricUses as $use)
                                                <tr>

                                                    <td>{{ $use->year }}</td>
                                                    <td>{{ $use->term }}</td>
                                                    <td>{{ $use->unit->name ?? '' }}</td>
                                                    <td>{{ $use->departement->name ?? '' }}</td>
                                                    <td>{{ number_format($use->amount)  }}</td>






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
                                                <td> مجموع مصرف :
                                                    {{ number_format($amount) }}


                                                </td>



                                                <td>
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


        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">نمودار مصرف کل</h4>
                </div>
                <div class="card-body">
                    <canvas id="totalUseChart"></canvas>
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


 <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<script>
        $('#unit').change(function() {
            var id = $(this).find('option:selected').val();


            $.ajax({
                method: 'get',
                url: "{{ url('/getdepartememtreport') }}",

                data: {
                    id: id
                },

                success: function(msg) {

                    $('#departememt').html(msg);

                }
            });
        });
    </script>




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









@endsection
