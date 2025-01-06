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

    CONST NATIONAL_CODE_PLACE = 'national_code_place';
    CONST PASSWORD_PLACE      = 'password_place';
    CONST LOGIN_USER          = 'login_user';
    CONST MAX_GUARANTEE_FORM  = 'max_guarantee_form';


    const SETTING_KEYS = [
        self::NATIONAL_CODE_PLACE,
        self::LOGIN_USER,
        self::PASSWORD_PLACE,
        self::MAX_GUARANTEE_FORM
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
