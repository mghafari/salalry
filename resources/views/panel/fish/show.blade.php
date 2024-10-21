@extends('panel.main')
@section('head')
    <link rel="stylesheet" href="/fish/style.css">
@endsection
@section('body')
    @include('panel.layouts.buttonpanel')




    <div id="main">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="fish">
                    <table>
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

                                 <span>{{$form->year}}/{{$form->month}}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>مشخصات پرسنل</th>
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

                                        <td class="inf">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td>کد پرسنلی:</td>
                                                    <td>
                                                        {{$form->user->personal_code}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>نام:</td>
                                                    <td>
                                                        {{$form->user->name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>نام خانوادگی:</td>
                                                    <td>
                                                        {{$form->user->family}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>عنوان:</td>
                                                    <td>
                                                        {{$form->onvan}}
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table class="auto">
                                                <tbody>
                                                <tr>
                                                    <td>کد ملی:</td>
                                                    <td>
                                                        {{$form->user->national_code}}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>شماره حساب:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>بانک رفاه:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>شماره بیمه:</td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>کارکرد عادی:</td>
                                        <td>{{$form->karkerd_adi}}</td>
                                    </tr>
                                    <tr>
                                        <td>کارکرد موثر:</td>
                                        <td>{{$form->karkerd_moaser}}</td>
                                    </tr>

                                        <td>غیبت:</td>
                                        <td>{{$form->gheybat}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td rowspan="3">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>حقوق پایه:</td>
                                        <td>{{number_format($form->hoghoghpaye)}} </td>
                                    </tr>
                                    <tr>
                                        <td>حق تاهل:</td>
                                        <td>{{number_format($form->haghtahol)}} </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>حق اولاد:</td>
                                        <td>{{number_format($form->hagholad)}} </td>
                                    </tr>
                                    <tr>
                                        <td>حق ماموریت:</td>
                                        <td>{{number_format($form->hagmamoriat)}} </td>
                                    </tr>  <tr>
                                        <td>حق ایاب و ذهاب :</td>
                                        <td>{{number_format($form->haghayabzahab)}} </td>
                                    </tr> <tr>
                                        <td>حق سرپرستی :</td>
                                        <td>{{number_format($form->haghsarparasti)}} </td>
                                    </tr><tr>
                                        <td>حق سنوات :</td>
                                        <td>{{number_format($form->haghsanavat)}} </td>
                                    </tr>
                                    <tr>
                                        <td>جمعه کاری:</td>
                                        <td>{{number_format($form->jomekari)}}</td>
                                    </tr>
                                    <tr>
                                        <td>تعطیل کاری:</td>
                                        <td>{{number_format($form->tatilkari)}}</td>
                                    </tr>
                                    <tr>

                                    </tbody>
                                </table>
                            </td>
                            <td rowspan="3">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>مالیات حقوق:</td>
                                        <td>{{number_format($form->maliyatmah)}}</td>
                                    </tr>
                                    <tr>
                                        <td>بیمه سهم کارمند:</td>
                                        <td>{{number_format($form->bimekarmand)}}</td>
                                    </tr>
                                    <tr>
                                        <td>بیمه تکمیلی:</td>
                                        <td>{{number_format($form->bimetakmilikarmand)}}</td>
                                    </tr>
                                    <tr>
                                        <td>بیمه عمر:</td>
                                        <td>{{number_format($form->bimeomrkarmand)}}</td>
                                    </tr>
                                    <tr>
                                        <td>سهام جهان فولاد:</td>
                                        <td>{{number_format($form->jahanfolad)}}</td>
                                    </tr>



                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>مانده وام ها</td>
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
                            <td>جمع حقوق و مزایا:
                                {{number_format($form->jamekolmazayanakhales)}}
                            </td>
                            <td></td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <td colspan="4">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            خالص پرداختی:

                                                  {{number_format($form->khalesepardakhti)}}
                                            ريال
                                        </td>
                                        <td class="inf">
                                            {{resolve('App\Helper\Number2Word')->numberToWords($form->khalesepardakhti ?? 0)}} ريال
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <a href="{{route('fish.print' , $form)}}" target="_top">
                        <button class="btn btn-success">
                            پرینت
                        </button>
                    </a>
                </div>

            </div>
        </div>

    </div>
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
