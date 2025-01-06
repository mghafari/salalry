<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuaranteeForm extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'price',
        'bank_or_institution',
        'registration_owner',
        'other_first_name',
        'other_last_name',
        'other_national_id',
        'type_shajareh',
        'status',
        'active_status'
    ];


    CONST YOURSEF_REGISTRATION_OWNER = 1;
    CONST OTHER_REGISTRATION_OWNER = 2;


    CONST TITLE_REGISTRATION_OWNER = [
        self::YOURSEF_REGISTRATION_OWNER => 'خودم',
        self::OTHER_REGISTRATION_OWNER   => 'دیگری',
    ];




    CONST STATUS_DEACTIVE          = 0;
    CONST STATUS_DRAFT             = 1;
    CONST STATUS_APPROVED_BY_USER  = 2;
    CONST STATUS_APPROVED_BY_ADMIN = 3;
    CONST STATUS_REJECT_BY_ADMIN   = 4;
    CONST STATUS_APPROVED_BY_CFO   = 5;
    CONST STATUS_REJECT_BY_CFO     = 6;
    CONST STATUS_APPROVED_BY_CEO   = 7;
    CONST STATUS_REJECT_BY_CEO     = 9;



    CONST STATUS_TITLE = [
        self::STATUS_DEACTIVE          => 'غیرفعال',
        self::STATUS_DRAFT             => 'پیش نویس',
        self::STATUS_APPROVED_BY_USER  => 'تایید توسط کاربر',
        self::STATUS_APPROVED_BY_ADMIN => 'تایید توسط ادمین',
        self::STATUS_REJECT_BY_ADMIN   => 'رد توسط ادمین',
        self::STATUS_APPROVED_BY_CFO   => 'تایید توسط مدیرمالی',
        self::STATUS_REJECT_BY_CFO     => 'رد توسط مدیرمالی',
        self::STATUS_APPROVED_BY_CEO   => 'تایید توسط مدیرعامل',
        self::STATUS_REJECT_BY_CEO     => 'رد توسط مدیرعامل',
    ];

    
    CONST STATUS_COLOR = [
        self::STATUS_DEACTIVE          => 'badge-light',
        self::STATUS_DRAFT             => 'badge-secondary',
        self::STATUS_APPROVED_BY_USER  => 'badge-primary',
        self::STATUS_APPROVED_BY_ADMIN => 'badge-primary',
        self::STATUS_REJECT_BY_ADMIN   => 'badge-danger',
        self::STATUS_APPROVED_BY_CFO   => 'badge-primary',
        self::STATUS_REJECT_BY_CFO     => 'badge-danger',
        self::STATUS_APPROVED_BY_CEO   => 'badge-success',
        self::STATUS_REJECT_BY_CEO     => 'badge-danger',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
