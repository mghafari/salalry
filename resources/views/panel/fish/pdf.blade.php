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

                                 <span>{{$payslipHeadImport->year}}/{{$payslipHeadImport->month}}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>مشخصات پرسنل</th>
                            <th>وضعیت کارکرد</th>
                            <th>مزایا</th>
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
                                                    @foreach($userInformationFields as $userInformationField)
                                                        @if(!($userInformationField->visible_zero && $userInformationField->value == 0))
                                                            <tr>
                                                                <td style="white-space: nowrap;">{{ $userInformationField->title }} :</td>
                                                                <td>
                                                                    {{ $userInformationField->value }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
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
                                        @foreach($installmentFields as $installmentField)
                                            @if(!($installmentField->visible_zero && $installmentField->value == 0))
                                                <tr>
                                                    <td>{{ $installmentField->title }} :</td>
                                                    <td>{{ $installmentField->value }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                            <td rowspan="3">
                                <table>
                                    <tbody>
                                        @foreach($benefitFields as $benefitField)
                                            @if(!($benefitField->visible_zero && $benefitField->value == 0))
                                                <tr>
                                                    <td>{{ $benefitField->title }} :</td>
                                                    <td>{{ $benefitField->value }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                            <td rowspan="3">
                                <table>
                                    <tbody>
                                        @foreach($deductionFields as $deductionField)
                                            @if(!($deductionField->visible_zero && $deductionField->value == 0))
                                                <tr>
                                                    <td>{{ $deductionField->title }} :</td>
                                                    <td>{{ $deductionField->value }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>مانده وام ها:
                                {{ fa_num($totalInstallment) }} ريال
                            </td>
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
                                {{ fa_num($totalBenefit) }} ريال
                            </td>
                            <td>
                                جمع کسورات:
                                {{ fa_num($totalDeduction) }} ريال
                            </td>
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

                                            {{ fa_num($netPaid) }}    
                                            ريال
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <a href="{{route('fish.print' , $payslipHeadImport)}}" target="_top">
                        <button class="btn btn-success">
                            پرینت
                        </button>
                    </a>
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





