<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayslipImport extends Model
{
    use HasFactory;

    protected $fillable = [
        'index',
        'value',
        'payslip_head_import_id'
    ];

    public function payslipHeadImport()
    {
        return $this->belongsTo(PayslipHeadImport::class);
    }
}
