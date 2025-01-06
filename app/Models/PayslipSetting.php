<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayslipSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'payslip_head',
        'index',
        'title',
        'category',
        'visible_zero',
        'status',
        'sort'
    ];

    CONST CATEGORY_BENEFIT           = 1;
    CONST CATEGORY_DEDUCTION         = 2;
    CONST CATEGORY_INSTALLMENT       = 3;
    CONST CATEGORY_USRER_INFORMATION = 4;


    CONST TITLE_CATEGORY = [
        self::CATEGORY_BENEFIT           => 'ستون مزایا',
        self::CATEGORY_DEDUCTION         => 'ستون کسری',
        self::CATEGORY_INSTALLMENT       => 'ستون کارکرد',
        self::CATEGORY_USRER_INFORMATION => 'ستون مشخصات کاربر',
    ];

    CONST STATUS_ACTIVE   = 1;
    CONST STATUS_DEACTIVE = 0;


    CONST TITLE_STATUS = [
        self::STATUS_ACTIVE   => 'فعال',
        self::STATUS_DEACTIVE => 'غیرفعال'
    ];

}
