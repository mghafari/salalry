<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayslipImport extends Model
{
    use HasFactory;

    protected $fillable = [
        'payslip_head_setting_id',
        'index',
        'value',
        'user_id'
    ];
}
