<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>درخواست تعهد کاربر</title>
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
        .content {
            margin-bottom: 40px;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="title">درخواست تعهد کاربر</div>
    <div class="content">
        مديرعامل محترم شركت راه و جاده<br>
        جناب آقای مهندس الله‌بخش<br>
        <br>
        باسلام،<br>
        احتراماً، اینجانب {{ $guaranteeForm->user->name() }} به شماره ملی {{ fa_num($guaranteeForm->user->national_code) }} خواستار تعهد حسابداری جهت دریافت وام از {{ $guaranteeForm->bank_or_institution }} به مبلغ {{ fa_num($guaranteeForm->price) }} ریال  می‌باشم و متعهد می‌شوم چنانچه اقساط وام دریافتی خود را پرداخت ننمایم، به محض اعلام بانک مربوطه، آن امور محق خواهد بود که مبلغ اعلام شده را از حقوق و مزایای اینجانب کسر و به بانک مربوطه عودت دهد.
    </div>
    <div class="footer">
        <p>در تاریخ {{ isset($userGuaranteeForm->created_at) ? fa_num(verta($userGuaranteeForm->created_at)->formatJalaliDate()) : '...' }} این درخواست توسط {{ $guaranteeForm->user->name() ?? '...' }} ارسال و تایید شد.</p>
        <p>در تاریخ {{ isset($cfoGuaranteeForm->created_at) ? fa_num(verta($cfoGuaranteeForm->created_at)->formatJalaliDate()) : '...' }} توسط {{ $cfoGuaranteeForm->editor_name ?? '...' }} مدیر مالی درخواست مورد موافقت قرار گرفت.</p>
        <p>در تاریخ {{ isset($ceoGuaranteeForm->created_at) ? fa_num(verta($ceoGuaranteeForm->created_at)->formatJalaliDate()) : '...' }} توسط {{ $ceoGuaranteeForm->editor_name ?? '...' }} مدیر عامل درخواست مورد موافقت قرار گرفت.</p>
    </div>
</body>
</html>
