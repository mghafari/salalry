<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value'
    ];


    CONST TOTAL_BENEFIT     = 'total_benefit';
    CONST TOTAL_DEDUCTION   = 'total_deduction';
    CONST TOTAL_INSTALLMENT = 'total_installment';
    CONST NET_PAID          = 'net_paid';


    const SETTING_KEYS = [
        self::TOTAL_BENEFIT,
        self::TOTAL_DEDUCTION,
        self::TOTAL_INSTALLMENT,
        self::NET_PAID
    ];


    public static function getExcelColumn($index) {
        $letters = range('A', 'Z');
        $column = '';
    
        while ($index > 0) {
            $index--; // Decrease the index to match 0-based counting
            $column = $letters[$index % 26] . $column;
            $index = floor($index / 26);
        }
    
        return $column;
    }
}
