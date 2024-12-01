<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayslipHeadImport extends Model
{
    use HasFactory;

    protected $fillablle = [
        'payslip_head_setting_id',
        'user_id',
        'month',
        'year'
    ];
}
