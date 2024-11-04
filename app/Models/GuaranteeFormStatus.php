<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuaranteeFormStatus extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'status_color'
    ];
}
