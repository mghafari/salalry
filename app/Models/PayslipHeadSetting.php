<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayslipHeadSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status'
    ];


    CONST STATUS_ACTIVE   = 1;
    CONST STATUS_DEACTIVE = 0;


    CONST TITLE_STATUS = [
        self::STATUS_ACTIVE   => 'فعال',
        self::STATUS_DEACTIVE => 'غیرفعال'
    ];
}
