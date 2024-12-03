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
