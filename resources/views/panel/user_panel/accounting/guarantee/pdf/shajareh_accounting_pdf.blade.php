<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعهدنامه حسابداری</title>
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
    <div class="title">تعهدنامه حسابداری</div>
    <p>
        ریاست محترم صندوق شجره نصر<br>
        باسلام و احترام<br>
        <br>
        بدینوسیله امور مالی این شرکت تعهد می‌نماید چنانچه آقای {{ $guaranteeForm->user->name() }} به شماره ملی {{ fa_num($guaranteeForm->user->national_code) }} اقساط وام دریافتی خود را پرداخت ننماید و یا در صورت ترک کار به محض اعلام آن بانک، حسابداری این شرکت متعهد به بازپرداخت آن خواهد بود و صندوق حق برداشت بدهی فرد وام گیرنده از حساب شرکت نزد آن صندوق را دارد. ضمناً سقف تعهدات مبلغ {{ fa_num($guaranteeForm->price) }} می‌باشد.
    </p>
    <br><br>
    <div class="signature">
        باتشكر<br>
        <b>مجید اله بخش</b><br>
        مدیرعامل شرکت راه و جاده
    </div>
</body>
</html>
