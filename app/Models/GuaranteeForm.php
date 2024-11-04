<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuaranteeForm extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'price',
        'bank_or_institution',
        'registration_owner',
        'first_name',
        'last_name',
        'nationale_id',
        'status_id',
        'active_status_id'
    ];
}
