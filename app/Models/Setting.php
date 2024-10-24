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


    CONST TOTAL_BENEFIT       = 'total_benefit';
    CONST TOTAL_DEDUCTION     = 'total_deduction';
    CONST TOTAL_INSTALLMENT   = 'total_installment';
    CONST NET_PAID            = 'net_paid';
    CONST NATIONAL_CODE_PLACE = 'national_code_place';
    CONST PERSONAL_CODE_PLACE = 'personal_code_place';
    CONST FIRST_NAME_PLACE    = 'first_name_place';
    CONST LAST_NAME_PLACE     = 'last_name_place';
    CONST MOBILE_PLACE        = 'mobile_place';


    const SETTING_KEYS = [
        self::TOTAL_BENEFIT,
        self::TOTAL_DEDUCTION,
        self::TOTAL_INSTALLMENT,
        self::NET_PAID,
        self::NATIONAL_CODE_PLACE,
        self::PERSONAL_CODE_PLACE,
        self::FIRST_NAME_PLACE,
        self::LAST_NAME_PLACE,
        self::MOBILE_PLACE,
    ];


    public static function getExcelColumn($index) {
        $letters = range('A', 'Z');
        $column = '';
    
        while ($index >= 0) {
            $column = $letters[$index % 26] . $column;
            $index = floor($index / 26) - 1; // Decrease by 1 after division to handle the next character
        }
    
        return $column;
    }
    
}
