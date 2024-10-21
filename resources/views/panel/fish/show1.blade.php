@extends('panel.main')
@section('head')
    <link rel="stylesheet" href="/fish/style.css">
@endsection
@section('body')
    @include('panel.layouts.buttonpanel')




    <body>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">انتخاب تاریخ فیش حقوقی  </h4>
            </div>
            <div class="card-body">
                <div class="form-row">




                        <form class="row gy-8 gx-8 align-items-center" action="{{route('user.fish.show')}}" method="get">

                            <div class="col-md-5">
                                <select class="form-control" name="month">
                                    <option value="">ماه</option>

                                    @for($i=1 ; $i<13 ; $i++)
                                        <option value="{{$i}}"  @if($form->month==$i) selected @endif  >{{$i}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-5">

                                <select class="form-control" name="year">
                                    <option value="">سال</option>

                                    @for($i=1402 ; $i<1403; $i++)
                                        <option value="{{$i}}" @if($form->year==$i) selected @endif>{{$i}}</option>

                                    @endfor
                                </select>
                            </div>

                            <div class="col-md-2">
                            <button class="btn btn-success">مشاهده</button>
                            </div>

                        </form>

                </div>


            </div>

        </div>
    </div>

    <div id="main"  style="background: #fff ; padding: 20px" >

        @if(isset($form))


        <div class="fish " >
            <table class="table table-responsive">
                <thead>
                <tr>
                    <td colspan="4">
                        <div class="logo">
                            <img src="/fish/images/logo-rahojade.png" alt="">
                        </div>
                        <span>
								شرکت حمل و نقل راه و جاده کرمان
							</span>
                        <span class="space"></span>
                        <span>فیش حقوقی</span>
                        <u>شرح پرداخت ها</u>
                        <span>{{$form->year}}/{{$form->month}}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                            <span>
                                نام و نام خانوادگی:
							  {{$form->user->name.' '.$form->user->family }}
							</span>


                        <span class="space"></span>
                        <span>
                            کد پرسنلی:
							  {{$form->user->personal_code}}
							</span>

                     <span></span>
                    </td>
                </tr>
                <tr>

                    <th>وضعیت کارکرد</th>
                    <th></th>
                    <th>شرح کسور</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <table>
                            <tbody>

                            <tr>
                                <td>کارکرد عادی:</td>
                                <td>{{$form->karkerd_adi}}   </td>
                            </tr>
                            <tr>
                                <td>کارکرد موثر:
                                <td>{{$form->karkerd_moaser}}   </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tbody>
                            <tr>
                                <td>کارکرد:
                                    {{$form->karkerd}}
                                </td>


                                <td>اضافه کار:
                               {{ $form->ezafekar_time ?? 0}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td rowspan="3">
                        <table>
                            <tbody>
                            <tr>
                                <td>حقوق ماهیانه:</td>
                                <td>{{ number_format($form->hoghoghmahiane)}} </td>
                            </tr>
                            <tr>
                                <td>حق شیفت:</td>
                                <td>{{ number_format($form->shift)}} </td>
                            </tr>
                            <tr>
                                <td>حق جذب:</td>
                                <td>{{ number_format($form->jazb)}}</td>
                            </tr>
                            <tr>
                                <td>تفاوت تطبیق:</td>
                                <td>{{ number_format($form->tatbigh)}}</td>
                            </tr>

                            <tr>
                                <td>حق مسکن:</td>
                                <td>{{ number_format($form->maskan)}}</td>
                            </tr>
                            <tr>
                                <td>حق اولاد:</td>
                                <td>{{ number_format($form->olad)}} </td>
                            </tr>
                            <tr>
                                <td>بن کارگری:</td>
                                <td>{{ number_format($form->bon)}} </td>
                            </tr>
                            <tr>
                                <td>اضافه کار:</td>
                                <td>{{ number_format($form->ezafekar)}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td rowspan="3">
                        <table>
                            <tbody>
                            <tr>
                                <td>مالیات حقوق:</td>
                                <td>{{ number_format($form->tax)}}</td>
                            </tr>
                            <tr>
                                <td>بیمه سهم کارمند:</td>
                                <td>{{ number_format($form->bimekarmand)}} </td>
                            </tr>
                            <tr>
                                <td>بیمه تکمیلی:</td>
                                <td>{{ number_format($form->bimetakmili)}} </td>
                            </tr>
                            <tr>
                                <td>قسط وام:</td>
                                <td>{{ number_format($form->aghsatvam)}} </td>
                            </tr>
                            <tr>
                                <td>بیمه عمر:</td>
                                <td>{{ number_format($form->bimeomr)}} </td>
                            </tr>
                            <tr>
                                <td>فروشگاه رفاه:</td>
                                <td>{{ number_format($form->refah)}}</td>
                            </tr>
                            <tr>
                                <td>بیمه البرز (دامون):</td>
                                <td>{{ number_format($form->alborz)}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>تعهدات <b> </b></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="3">
                        <table>
                            <tbody>


                            </tbody>
                        </table>
                    </td>
                    <td rowspan="3"></td>
                </tr>
                <tr>
                    <td>جمع حقوق و مزایا: {{ number_format($form->totalSalary)}}</td>
                    <td>جمع کسور: {{ number_format($form->jamekosor)}}</td>
                </tr>
                <tr>
                    <td colspan="2">حقوق منفی :{{ number_format($form->manfi)}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table>
                            <tbody>
                            <tr>
                                <td>خالص پرداختی: {{ number_format($form->khalespardakhti)}}</td>
                                <td class="inf">

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="{{route('fish.print' , $form)}}" target="_top">
            <button class="btn btn-success">
                پرینت
            </button>
            </a>
        </div>
        @else
        <div class="alert alert-info">اطلاعاتی برای نمایش وجود ندارد</div>
            @endif
        </div>


    </body>
    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        $(document).ready(function() {
            $('.emp').select2();
        });
    </script>





@endsection
