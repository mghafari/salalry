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
        'visible_zero'
    ];
}
