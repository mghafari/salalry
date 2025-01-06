<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayslipHeadImport extends Model
{
    use HasFactory;

    protected $fillable = [
        'payslip_head_setting_id',
        'user_id',
        'month',
        'year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payslipHeadSetting()
    {
        return $this->belongsTo(PayslipHeadSetting::class);
    }

    public function payslipImports()
    {
        return $this->hasMany(PayslipImport::class);
    }

}
