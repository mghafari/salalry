<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعهدنامه ضمانت حسابداری</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            direction: rtl;
            text-align: right;
            line-height: 1.8;
            margin: 20px;
        }
        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .signature {
            margin-top: 50px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="title">تعهدنامه ضمانت حسابداری</div>
    <p>
        ریاست محترم {{ $guaranteeForm->bank_or_institution }}<br>
        باسلام و احترام<br>
        <br>
        بدینوسیله امور مالی این شرکت متعهد می‌گردد، چنانچه آقای/خانم {{ $guaranteeForm->other_first_name . ' ' . $guaranteeForm->other_last_name }}<br>
        به شماره ملی {{ $guaranteeForm->other_national_id }} اقساط وام دریافتی خود را نزد آن شعبه پرداخت ننماید،<br>
        به محض اعلام آن بانک از حقوق و مزایای ضامن ایشان آقای {{ $guaranteeForm->user->name() }}<br>
        به شماره ملی {{ fa_num($guaranteeForm->user->national_code) }} کسر و به حساب اعلام شده واریز نماید.<br>
        ضمناً سقف تعهدات مبلغ {{ fa_num($guaranteeForm->price) }} می‌باشد.<br>
        بدیهی است این امر تا مادامی که نامبرده در این شرکت شاغل می‌باشد مقدور است.
    </p>
    <br><br>
    <div class="signature">
        با تشکر<br>
        <b>مجید اله بخش</b><br>
        مدیرعامل شرکت راه و جاده
    </div>
</body>
</html>
