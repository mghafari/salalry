<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayslipHeadSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'place_total_benefit',
        'place_total_deduction',
        'place_total_installment',
        'place_net_paid',
        'status'
    ];


    CONST STATUS_ACTIVE   = 1;
    CONST STATUS_DEACTIVE = 0;


    CONST TITLE_STATUS = [
        self::STATUS_ACTIVE   => 'فعال',
        self::STATUS_DEACTIVE => 'غیرفعال'
    ];
}
