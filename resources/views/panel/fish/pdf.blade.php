<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>	گروه مجتمع صنعتی فناوران صنعت بردسیر</title>
    <link rel="stylesheet" href="/fish/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <title>فیش حقوقی</title>
</head>






    <body>
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
                </div>

            </div>
        </div>

    </div>
    <div style="font-size: 20px;

    margin-right: 50%;">
        <button class="btn btn-success print-window print"   >پرینت </button>
        <button onclick="history.back()" class="btn btn-success print-window print"        >بازگشت</button>

    </div>


    </body>
</html>



<script>

    $('.print-window').click(function() {

        $('.print').hide();
        (window).print();
        $('.print').show();

    });

</script>





