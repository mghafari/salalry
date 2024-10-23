<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_benefit',
        'total_deduction',
        'total_installment',
        'net_paid'
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
